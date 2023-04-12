<?php

namespace Tests\User\Application;


use Tests\User\Application\Request\ShowUserByUuidRequestMother;

class ShowUserByUuidUnitTest extends UserUnitTestCase
{
    /** @test */
    public function should_show_User(): void
    {
        $this->shouldFind(ShowUserByUuidRequestMother::random());
    }
}
