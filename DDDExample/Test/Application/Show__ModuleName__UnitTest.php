<?php

namespace Tests\__ModuleName__\Application;


use Tests\__ModuleName__\Application\Request\Show__ModuleName__RequestMother;

class Show__ModuleName__UnitTest extends __ModuleName__UnitTestCase
{
    /** @test */
    public function should_show___ModuleName__(): void
    {
        $this->shouldFind(Show__ModuleName__RequestMother::random());
    }
}
