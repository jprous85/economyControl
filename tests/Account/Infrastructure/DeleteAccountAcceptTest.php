<?php

declare(strict_types=1);

namespace Tests\Account\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\Account\Infrastructure\Request\AccountRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class DeleteAccountAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_delete_account_and_return_200()
    {
        $account_params = $this->createParams(AccountRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'accounts' .
            DIRECTORY_SEPARATOR .
            'create',
            $account_params);

        $response = $this->httpAction(
            'delete',
            'accounts' .
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
