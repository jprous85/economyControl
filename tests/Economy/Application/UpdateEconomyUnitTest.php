<?php

namespace Tests\Economy\Application;

use Src\Economy\Application\Request\EconomyIdRequest;
use Tests\Economy\Application\Request\ShowEconomyRequestMother;
use Tests\Economy\Application\Request\UpdateEconomyRequestMother;
use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;


class UpdateEconomyUnitTest extends EconomyUnitTestCase
{
    /** @test */
    public function should_update_Economy(): void
    {
        $this->shouldUpdate(EconomyIdVOMother::random()->value(), UpdateEconomyRequestMother::random());
        self::assertTrue(true);
    }
}
