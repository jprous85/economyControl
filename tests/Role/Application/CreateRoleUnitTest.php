<?php

namespace Tests\Role\Application;

use Tests\Role\Application\Request\CreateRoleRequestMother;


class CreateRoleUnitTest extends RoleUnitTestCase
{
    /** @test */
    public function should_create_Role(): void
    {
        $this->shouldCreate(CreateRoleRequestMother::random());
        self::assertTrue(true);
    }
}
