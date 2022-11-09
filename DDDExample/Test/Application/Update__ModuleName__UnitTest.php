<?php

namespace Tests\__ModuleName__\Application;

use Tests\__ModuleName__\Application\Request\Show__ModuleName__RequestMother;
use Tests\__ModuleName__\Application\Request\Update__ModuleName__RequestMother;


class Update__ModuleName__UnitTest extends __ModuleName__UnitTestCase
{
    /** @test */
    public function should_update___ModuleName__(): void
    {
        $this->shouldUpdate(Show__ModuleName__RequestMother::random()->getId(), Update__ModuleName__RequestMother::random());
        self::assertTrue(true);
    }
}
