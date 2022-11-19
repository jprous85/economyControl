<?php

declare(strict_types=1);

namespace Tests\Role\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAllRoleAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all_role_and_return_200()
    {
        $response = $this->httpAction(
            'get',
            'roles' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
