<?php

namespace Tests\Economy\Application;


use Tests\Economy\Application\Request\ShowEconomyRequestMother;

class ShowEconomyUnitTest extends EconomyUnitTestCase
{
    /** @test */
    public function should_show_Economy(): void
    {
        $this->shouldFind(ShowEconomyRequestMother::random());
    }
}
