<?php

declare(strict_types=1);

namespace Tests\Role\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Role\Infrastructure\Request\RoleRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class CreateRoleAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create_role_and_return_200()
    {
        $role_params = $this->createParams(RoleRequestMother::class);

        $response = $this->httpAction(
            'post',
            'roles' .
            DIRECTORY_SEPARATOR .
            'create',
            $role_params);

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
