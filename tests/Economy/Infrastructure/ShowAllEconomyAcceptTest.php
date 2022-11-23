<?php

declare(strict_types=1);

namespace Tests\Economy\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAllEconomyAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all_economy_and_return_200()
    {
        $response = $this->httpAction(
            'get',
            'economyes' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
