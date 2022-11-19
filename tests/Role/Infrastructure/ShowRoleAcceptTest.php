<?php

declare(strict_types=1);

namespace Tests\Role\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Role\Infrastructure\Request\RoleRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowRoleAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_role_and_return_200()
    {
        $role_params = $this->createParams(RoleRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'roles' .
            DIRECTORY_SEPARATOR .
            'create',
            $role_params);

        $response = $this->httpAction(
            'get',
            'roles' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'show');

        $response->assertStatus(Response::HTTP_OK);
    }
}
