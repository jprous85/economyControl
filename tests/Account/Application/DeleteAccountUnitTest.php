<?php

namespace Tests\Account\Application;


use Tests\Account\Application\Request\DeleteAccountRequestMother;

class DeleteAccountUnitTest extends AccountUnitTestCase
{
    /**
     * @test
     */
    public function should_delete_Account(): void
    {
        $this->shouldDelete(DeleteAccountRequestMother::random());
        self::assertTrue(true);
    }
}
