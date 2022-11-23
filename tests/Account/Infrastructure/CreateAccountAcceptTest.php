<?php

declare(strict_types=1);

namespace Tests\Account\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Account\Infrastructure\Request\AccountRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class CreateAccountAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_create_account_and_return_200()
    {
        $account_params = $this->createParams(AccountRequestMother::class);

        $response = $this->httpAction(
            'post',
            'accounts' .
            DIRECTORY_SEPARATOR .
            'create',
            $account_params);

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
