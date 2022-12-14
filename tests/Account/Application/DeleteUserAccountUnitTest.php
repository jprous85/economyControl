<?php

declare(strict_types=1);


namespace Tests\Account\Application;


use Tests\Account\Application\Request\ModifyUserAccountRequestMother;

class DeleteUserAccountUnitTest extends AccountUnitTestCase
{

    /**
     * @test
     */
    public function should_delete_user_from_an_Account(): void
    {
        $this->deleteUserFromAnAccount(ModifyUserAccountRequestMother::random());
        self::assertTrue(true);
    }
}
