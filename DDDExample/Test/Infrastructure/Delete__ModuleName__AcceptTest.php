<?php

declare(strict_types=1);

namespace Tests\__ModuleName__\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\__ModuleName__\Infrastructure\Request\__ModuleName__RequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class Delete__ModuleName__AcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_delete___ModuleMinUnderscoreName___and_return_200()
    {
        $__ModuleMinUnderscoreName___params = $this->createParams(__ModuleName__RequestMother::class);

        $response_created = $this->httpAction(
            'post',
            '__ModuleMinCamelCaseNameWithPlural__' .
            DIRECTORY_SEPARATOR .
            'create',
            $__ModuleMinUnderscoreName___params);

        $response = $this->httpAction(
            'delete',
            '__ModuleMinCamelCaseNameWithPlural__' .
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
