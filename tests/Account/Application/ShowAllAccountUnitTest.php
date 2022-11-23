<?php

namespace Tests\Account\Application;


class ShowAllAccountUnitTest extends AccountUnitTestCase
{
    /** @test */
    public function should_show_all_Account(): void
    {
        $this->shouldFindAll();
    }
}
