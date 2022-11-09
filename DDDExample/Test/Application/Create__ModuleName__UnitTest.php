<?php

namespace Tests\__ModuleName__\Application;

use Tests\__ModuleName__\Application\Request\Create__ModuleName__RequestMother;


class Create__ModuleName__UnitTest extends __ModuleName__UnitTestCase
{
    /** @test */
    public function should_create___ModuleName__(): void
    {
        $this->shouldCreate(Create__ModuleName__RequestMother::random());
        self::assertTrue(true);
    }
}
