<?php

namespace Tests\Economy\Application;


class ShowAllEconomyUnitTest extends EconomyUnitTestCase
{
    /** @test */
    public function should_show_all_Economy(): void
    {
        $this->shouldFindAll();
    }
}
