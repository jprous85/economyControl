<?php

namespace Tests\__ModuleName__\Application;


use Tests\__ModuleName__\Application\Request\Delete__ModuleName__RequestMother;

class Delete__ModuleName__UnitTest extends __ModuleName__UnitTestCase
{
    /**
     * @test
     */
    public function should_delete___ModuleName__(): void
    {
        $this->shouldDelete(Delete__ModuleName__RequestMother::random());
    }
}
