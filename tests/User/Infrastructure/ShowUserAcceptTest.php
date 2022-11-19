<?php

declare(strict_types=1);

namespace Tests\User\Infrastructure;

use Symfony\Component\HttpFoundation\Response;
use Tests\User\Infrastructure\Request\UserRequestMother;
use Tests\Shared\Infrastructure\Controllers\AcceptTestBase;

final class ShowUserAcceptTest extends AcceptTestBase
{
    /**
     * @test
     */
    public function should_show_user_and_return_200()
    {
        $user_params = $this->createParams(UserRequestMother::class);

        $response_created = $this->httpAction(
            'post',
            'users' .
            DIRECTORY_SEPARATOR .
            'create',
            $user_params);

        $response = $this->httpAction(
            'get',
            'users' .
            DIRECTORY_SEPARATOR .
            $response_created['id'] .
            DIRECTORY_SEPARATOR .
            'show');

        $response->assertStatus(Response::HTTP_OK);
    }
}
