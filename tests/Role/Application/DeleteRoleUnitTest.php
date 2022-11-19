<?php

namespace Tests\Role\Application;


use Tests\Role\Application\Request\DeleteRoleRequestMother;

class DeleteRoleUnitTest extends RoleUnitTestCase
{
    /**
     * @test
     */
    public function should_delete_Role(): void
    {
        $this->shouldDelete(DeleteRoleRequestMother::random());
    }
}
