<?php

namespace Tests\User\Application;


use Tests\User\Application\Request\ShowUserRequestMother;

class ShowUserUnitTest extends UserUnitTestCase
{
    /** @test */
    public function should_show_User(): void
    {
        $this->shouldFind(ShowUserRequestMother::random());
    }
}
