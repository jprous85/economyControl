<?php

namespace Tests\User\Application;

use Tests\User\Application\Request\ShowUserRequestMother;
use Tests\User\Application\Request\UpdateUserRequestMother;


class UpdateUserUnitTest extends UserUnitTestCase
{
    /** @test */
    public function should_update_User(): void
    {
        $this->shouldUpdate(ShowUserRequestMother::random()->getId(), UpdateUserRequestMother::random());
        self::assertTrue(true);
    }
}
