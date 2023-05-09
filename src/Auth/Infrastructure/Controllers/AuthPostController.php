<?php

declare(strict_types=1);


namespace Src\Auth\Infrastructure\Controllers;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dirape\Token\Token;
use Src\Auth\Application\Request\LoginRequest;
use Src\Shared\Application\SendEmail\SendEmailDTO;
use Src\Shared\Domain\Repositories\SendEmailRepository;
use Src\Shared\Infrastructure\CommonFunctions\CommonFunctions;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\UseCases\UpdateLastLogin;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;
use Symfony\Component\HttpFoundation\Response;

final class AuthPostController extends ReturnsMiddleware
{

    private string $scope;

    public function __construct(
        private UpdateLastLogin     $updateLastLogin,
        private SendEmailRepository $sendEmailRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function login(Request $request): JsonResponse
    {
        $loginRequest = new LoginRequest(
            $request->get('email'),
            $request->get('password')
        );

        if (Auth::attempt(['email' => $loginRequest->email(), 'password' => $loginRequest->password()])) {
            $user     = Auth::user();
            $userRole = $user->role()->first();

            if ($userRole) {
                $this->scope = $userRole->name;
            }

            $token = $user->createToken('token', [$this->scope]);

            ($this->updateLastLogin)(new ShowUserRequest($user->id));

            return $this->successArrayResponse(
                [
                    'token' => $token,
                    'theme' => 'dark'//$user->config->theme
                ]
            );
        }

        return response()->json('cannot login, email or password are wrong', Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @throws Exception
     */
    public function register(Request $request): void
    {
        $input             = $request->all();
        $password          = CommonFunctions::generateRandomString();
        $input['password'] = bcrypt($password);
        $input['api_key']  = (new Token())->Unique('users', 'api_key', 60);

        $user = UserORMModel::create($input);

        $urlOtpBase64 = env('APP_FRONT_URL')
            . DIRECTORY_SEPARATOR
            . 'opt-register'
            . DIRECTORY_SEPARATOR
            . base64_encode(
                json_encode(
                    [
                        'email'     => $user['email'],
                        'password'  => $password,
                        'timestamp' => time()
                    ],
                    512,
                    JSON_THROW_ON_ERROR
                )
            );

        $this->sendEmailRepository->send(
            new SendEmailDTO(
                to: $user['email'],
                cc: null,
                bcc: null,
                subject: 'email/welcome.subject',
                template: 'email.welcome',
                language: 'es',
                params: [
                    'email'    => $user['email'],
                    'password' => $password,
                    'url'      => $urlOtpBase64
                ]
            )
        );
    }

    public function logout(): JsonResponse
    {
        Auth::logout();
        return $this->successResponse('logout successfully');
    }
}
