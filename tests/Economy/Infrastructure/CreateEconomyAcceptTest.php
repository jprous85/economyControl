<?php

declare(strict_types=1);

namespace Tests\Economy\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Economy\Infrastructure\Request\EconomyRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class CreateEconomyAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create_economy_and_return_200()
    {
        $economy_params = $this->createParams(EconomyRequestMother::class);

        $response = $this->httpAction(
            'post',
            'economyes' .
            DIRECTORY_SEPARATOR .
            'create',
            $economy_params);

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
