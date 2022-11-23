<?php

namespace Tests\Economy\Application;

use Tests\Economy\Application\Request\CreateEconomyRequestMother;


class CreateEconomyUnitTest extends EconomyUnitTestCase
{
    /** @test */
    public function should_create_Economy(): void
    {
        $this->shouldCreate(CreateEconomyRequestMother::random());
        self::assertTrue(true);
    }
}
