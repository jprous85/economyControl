<?php

declare(strict_types=1);


namespace Tests\Account\Application;


use Tests\User\Application\Request\ShowUserRequestMother;

class GetAccountByUserUnitTest extends AccountUnitTestCase
{
    /**
    * @test
    */
    public function should_return_account_by_user_id ()
    {
        $this->getAccountByUserId(ShowUserRequestMother::random());
    }
}
