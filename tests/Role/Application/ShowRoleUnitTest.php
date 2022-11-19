<?php

namespace Tests\Role\Application;


use Tests\Role\Application\Request\ShowRoleRequestMother;

class ShowRoleUnitTest extends RoleUnitTestCase
{
    /** @test */
    public function should_show_Role(): void
    {
        $this->shouldFind(ShowRoleRequestMother::random());
    }
}
