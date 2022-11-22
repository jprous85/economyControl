<?php

namespace Tests\User\Application;


use Tests\User\Application\Request\DeleteUserRequestMother;

class DeleteUserUnitTest extends UserUnitTestCase
{
    /**
     * @test
     */
    public function should_delete_User(): void
    {
        $this->shouldDelete(DeleteUserRequestMother::random());
        self::assertTrue(true);
    }
}
