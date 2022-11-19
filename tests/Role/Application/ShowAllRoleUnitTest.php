<?php

namespace Tests\Role\Application;


class ShowAllRoleUnitTest extends RoleUnitTestCase
{
    /** @test */
    public function should_show_all_Role(): void
    {
        $this->shouldFindAll();
    }
}
