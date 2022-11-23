<?php

namespace Tests\Account\Application;

use Tests\Account\Application\Request\CreateAccountRequestMother;


class CreateAccountUnitTest extends AccountUnitTestCase
{
    /** @test */
    public function should_create_Account(): void
    {
        $this->shouldCreate(CreateAccountRequestMother::random());
        self::assertTrue(true);
    }
}
