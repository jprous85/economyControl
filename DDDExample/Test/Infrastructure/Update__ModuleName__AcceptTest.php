<?php

declare(strict_types=1);

namespace Tests\__ModuleName__\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\__ModuleName__\Infrastructure\Request\__ModuleName__RequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class Update__ModuleName__AcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_update___ModuleMinUnderscoreName___and_return_200()
    {
        $__ModuleMinUnderscoreName___params = $this->createParams(__ModuleName__RequestMother::class);

        $params = $this->createParams(__ModuleName__RequestMother::class);
        unset($params['id']);

        $response_created = $this->httpAction(
            'post',
            '__ModuleMinCamelCaseNameWithPlural__' .
            DIRECTORY_SEPARATOR .
            'create',
            $__ModuleMinUnderscoreName___params);

        $response = $this->httpAction(
            'put',
            '__ModuleMinCamelCaseNameWithPlural__' .
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
