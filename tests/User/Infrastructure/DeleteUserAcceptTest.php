<?php

declare(strict_types=1);

namespace Tests\User\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\User\Infrastructure\Request\UserRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class DeleteUserAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_delete_user_and_return_200()
    {
        $user_params = $this->createParams(UserRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'users' .
            DIRECTORY_SEPARATOR .
            'create',
            $user_params);

        $response = $this->httpAction(
            'delete',
            'users' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'delete');

        /*
         * $response->assertExactJson(
            ["code"    => 200,
             "status"  => "OK",
             "message" => "",
             "id"      => $response_created['id']
            ]);
         * */

        $response->assertStatus(Response::HTTP_OK);
    }
}
