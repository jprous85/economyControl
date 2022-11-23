<?php

namespace Tests\Account\Application;

use Tests\Account\Application\Request\ShowAccountRequestMother;
use Tests\Account\Application\Request\UpdateAccountRequestMother;


class UpdateAccountUnitTest extends AccountUnitTestCase
{
    /** @test */
    public function should_update_Account(): void
    {
        $this->shouldUpdate(ShowAccountRequestMother::random()->getId(), UpdateAccountRequestMother::random());
        self::assertTrue(true);
    }
}
