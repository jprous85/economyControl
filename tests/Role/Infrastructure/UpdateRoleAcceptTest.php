<?php

declare(strict_types=1);

namespace Tests\Role\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Role\Infrastructure\Request\RoleRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class UpdateRoleAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_update_role_and_return_200()
    {
        $role_params = $this->createParams(RoleRequestMother::class);

        $params = $this->createParams(RoleRequestMother::class);
        unset($params['id']);

        $response_created = $this->httpAction(
            'post',
            'roles' .
            DIRECTORY_SEPARATOR .
            'create',
            $role_params);

        $response = $this->httpAction(
            'put',
            'roles' .
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
