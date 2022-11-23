<?php

namespace Tests\Account\Application;


use Tests\Account\Application\Request\ShowAccountRequestMother;

class ShowAccountUnitTest extends AccountUnitTestCase
{
    /** @test */
    public function should_show_Account(): void
    {
        $this->shouldFind(ShowAccountRequestMother::random());
    }
}
