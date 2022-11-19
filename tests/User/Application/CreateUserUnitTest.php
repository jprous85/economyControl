<?php

namespace Tests\User\Application;

use Tests\User\Application\Request\CreateUserRequestMother;


class CreateUserUnitTest extends UserUnitTestCase
{
    /** @test */
    public function should_create_User(): void
    {
        $this->shouldCreate(CreateUserRequestMother::random());
        self::assertTrue(true);
    }
}
