<?php

declare(strict_types=1);

namespace Tests\__ModuleName__\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\__ModuleName__\Infrastructure\Request\__ModuleName__RequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class Create__ModuleName__AcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create___ModuleMinUnderscoreName___and_return_200()
    {
        $__ModuleMinUnderscoreName___params = $this->createParams(__ModuleName__RequestMother::class);

        $response = $this->httpAction(
            'post',
            '__ModuleMinCamelCaseNameWithPlural__' .
            DIRECTORY_SEPARATOR .
            'create',
            $__ModuleMinUnderscoreName___params);

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
