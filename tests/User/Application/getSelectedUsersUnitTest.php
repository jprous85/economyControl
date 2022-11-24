<?php

namespace Tests\User\Application;


use Tests\User\Application\Request\ShowUserRequestMother;

class getSelectedUsersUnitTest extends UserUnitTestCase
{
    /** @test */
    public function should_get_all_selected_users(): void
    {
        $user1 = ShowUserRequestMother::random();
        $user2 = ShowUserRequestMother::random();
        $user3 = ShowUserRequestMother::random();

        $this->shouldGetSelectedUsers([$user1->getId(), $user2->getId(), $user3->getId()]);
    }
}
