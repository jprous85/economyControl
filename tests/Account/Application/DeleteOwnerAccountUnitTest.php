<?php

declare(strict_types=1);


namespace Tests\Account\Application;


use Tests\Account\Application\Request\ModifyOwnersAccountRequestMother;

class DeleteOwnerAccountUnitTest extends AccountUnitTestCase
{

    /**
     * @test
     * @throws \JsonException
     */
    public function should_insert_owner_Account(): void
    {
        $this->deleteOwnerAccount(ModifyOwnersAccountRequestMother::random());
        self::assertTrue(true);
    }
}
