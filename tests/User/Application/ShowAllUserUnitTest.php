<?php

namespace Tests\User\Application;


class ShowAllUserUnitTest extends UserUnitTestCase
{
    /** @test */
    public function should_show_all_User(): void
    {
        $this->shouldFindAll();
    }
}
