<?php

declare(strict_types=1);


namespace Tests\Account\Application;


use Tests\Account\Application\Request\DeleteUserAccountRequestMother;

class DeleteUserAccountUnitTest extends AccountUnitTestCase
{

    /**
     * @test
     */
    public function should_delete_user_from_an_Account(): void
    {
        $this->deleteUserFromAnAccount(DeleteUserAccountRequestMother::random());
        self::assertTrue(true);
    }
}
