<?php

declare(strict_types=1);

namespace Tests\User\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAllUserAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all_user_and_return_200()
    {
        $response = $this->httpAction(
            'get',
            'users' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
