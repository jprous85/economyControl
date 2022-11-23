<?php

declare(strict_types=1);

namespace Tests\Account\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAllAccountAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all_account_and_return_200()
    {
        $response = $this->httpAction(
            'get',
            'accounts' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
