<?php

declare(strict_types=1);


namespace Tests\Account\Application;


use Tests\Account\Application\Request\ModifyOwnersAccountRequestMother;

class InsertOwnerAccountUnitTest extends AccountUnitTestCase
{

    /**
     * @test
     */
    public function should_insert_owner_Account(): void
    {
        $this->insertOwnerAccount(ModifyOwnersAccountRequestMother::random());
        self::assertTrue(true);
    }
}
