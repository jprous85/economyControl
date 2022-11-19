<?php

declare(strict_types=1);

namespace Tests\User\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\User\Infrastructure\Request\UserRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class CreateUserAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create_user_and_return_200()
    {
        $user_params = $this->createParams(UserRequestMother::class);

        $response = $this->httpAction(
            'post',
            'users' .
            DIRECTORY_SEPARATOR .
            'create',
            $user_params);

        /*$response->assertExactJson(
            ["code"    => 200,
             "status"  => "OK",
             "message" => "",
             "id"      => $response['id']
            ]);*/

        if ($response['code'] != 200) {
            dump($response);
        }

        $response->assertStatus(Response::HTTP_OK);

    }
}
