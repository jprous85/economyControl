<?php

namespace Tests\Economy\Application;

use Tests\Economy\Application\Request\ShowEconomyRequestMother;
use Tests\Economy\Application\Request\UpdateEconomyRequestMother;


class UpdateEconomyUnitTest extends EconomyUnitTestCase
{
    /** @test */
    public function should_update_Economy(): void
    {
        $this->shouldUpdate(ShowEconomyRequestMother::random()->getId(), UpdateEconomyRequestMother::random());
        self::assertTrue(true);
    }
}
