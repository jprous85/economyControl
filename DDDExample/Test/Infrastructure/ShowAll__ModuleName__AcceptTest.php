<?php

declare(strict_types=1);

namespace Tests\__ModuleName__\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowAll__ModuleName__AcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_all___ModuleMinUnderscoreName___and_return_200()
    {
        $response = $this->httpAction(
            'get',
            '__ModuleMinCamelCaseNameWithPlural__' .
            DIRECTORY_SEPARATOR .
            'read');

        $response->assertStatus(Response::HTTP_OK);
    }
}
