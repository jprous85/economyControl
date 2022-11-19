<?php

declare(strict_types=1);

namespace Tests\User\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\User\Infrastructure\Request\UserRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class UpdateUserAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_update_user_and_return_200()
    {
        $user_params = $this->createParams(UserRequestMother::class);

        $params = $this->createParams(UserRequestMother::class);
        unset($params['id']);

        $response_created = $this->httpAction(
            'post',
            'users' .
            DIRECTORY_SEPARATOR .
            'create',
            $user_params);

        $response = $this->httpAction(
            'put',
            'users' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'update',
            $params);

        /*
         * $response->assertExactJson(
            ["code"    => 200,
             "status"  => "OK",
             "message" => "",
             "id"      => $response['id']
            ]);
         */

        $response->assertStatus(Response::HTTP_OK);
    }
}
