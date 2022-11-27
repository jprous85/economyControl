<?php

namespace Tests\Account\Application;

use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\UseCases\CreateAccount;
use Src\Account\Application\UseCases\DeleteUserAccount;
use Src\Account\Application\UseCases\InsertUserAccount;
use Src\Account\Application\UseCases\ShowAccount;
use Src\Account\Application\UseCases\ShowAllAccount;
use Src\Account\Application\UseCases\UpdateAccount;
use Src\Account\Application\UseCases\DeleteAccount;
use Src\Account\Domain\Account\Repositories\AccountRepository;

use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Application\Request\DeleteAccountRequest;

use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;


use Mockery;
use Mockery\MockInterface;
use Tests\Account\Domain\Account\AccountMother;
use Tests\TestCase;

abstract class AccountUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
    }

    protected function shouldCreate(CreateAccountRequest $request)
    {
        $account_id = AccountIdVOMother::random();
        $this->mock->shouldReceive('save')->andReturn($account_id);

        $creator = new CreateAccount($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowAccountRequest $request)
    {
        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);

        $finder = new ShowAccount($this->mock);
        $finder->__invoke($request);
    }

    protected function shouldFindAll()
    {
        $this->mock->shouldReceive('showAll')->andReturns(array());

        $finder = new ShowAllAccount($this->mock);
        $finder->__invoke();
    }

    protected function shouldUpdate(int $id, UpdateAccountRequest $request)
    {
        $account_mother = AccountMother::random();
        $this->mock->shouldReceive('show')->andReturn($account_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateAccount($this->mock);
        $update->__invoke($id, $request);
    }

    protected function insertUserFromAnAccount(ModifyUserAccountRequest $request)
    {

        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);
        $this->mock->shouldReceive('update');

        $deleteUserFromAnAccount = new InsertUserAccount($this->mock);
        $deleteUserFromAnAccount->__invoke($request);
    }

    protected function deleteUserFromAnAccount(ModifyUserAccountRequest $request)
    {

        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);
        $this->mock->shouldReceive('update');

        $deleteUserFromAnAccount = new DeleteUserAccount($this->mock);
        $deleteUserFromAnAccount->__invoke($request);
    }

    protected function shouldDelete(DeleteAccountRequest $id)
    {
        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturns($account);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteAccount($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface | AccountRepository
    {
        return Mockery::mock(AccountRepository::class);
    }

}
