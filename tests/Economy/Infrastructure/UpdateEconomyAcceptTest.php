<?php

declare(strict_types=1);

namespace Tests\Economy\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Economy\Infrastructure\Request\EconomyRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class UpdateEconomyAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_update_economy_and_return_200()
    {
        $economy_params = $this->createParams(EconomyRequestMother::class);

        $params = $this->createParams(EconomyRequestMother::class);
        unset($params['id']);

        $response_created = $this->httpAction(
            'post',
            'economyes' .
            DIRECTORY_SEPARATOR .
            'create',
            $economy_params);

        $response = $this->httpAction(
            'put',
            'economyes' .
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
