<?php

declare(strict_types=1);


namespace Tests\Account\Application;


use Tests\Account\Application\Request\ModifyUserAccountRequestMother;

class InsertUserAccountUnitTest extends AccountUnitTestCase
{

    /**
     * @test
     */
    public function should_insert_user_from_an_Account(): void
    {
        $this->insertUserFromAnAccount(ModifyUserAccountRequestMother::random());
        self::assertTrue(true);
    }
}
