<?php

namespace Tests\Role\Application;

use Tests\Role\Application\Request\ShowRoleRequestMother;
use Tests\Role\Application\Request\UpdateRoleRequestMother;


class UpdateRoleUnitTest extends RoleUnitTestCase
{
    /** @test */
    public function should_update_Role(): void
    {
        $this->shouldUpdate(ShowRoleRequestMother::random()->getId(), UpdateRoleRequestMother::random());
        self::assertTrue(true);
    }
}
