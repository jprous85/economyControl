<?php

namespace Tests\Account\Application;

use JsonException;
use Src\Account\Application\Request\ModifyOwnerAccountRequest;
use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Application\Request\ShowAccountUuidRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Application\Response\AccountResponses;
use Src\Account\Application\UseCases\CreateAccount;
use Src\Account\Application\UseCases\DeleteOwnerAccount;
use Src\Account\Application\UseCases\DeleteUserAccount;
use Src\Account\Application\UseCases\GetAccountByUserId;
use Src\Account\Application\UseCases\InsertOwnerAccount;
use Src\Account\Application\UseCases\InsertUserAccount;
use Src\Account\Application\UseCases\ShowAccount;
use Src\Account\Application\UseCases\ShowAllAccount;
use Src\Account\Application\UseCases\UpdateAccount;
use Src\Account\Application\UseCases\DeleteAccount;
use Src\Account\Domain\Account\Repositories\AccountRepository;

use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Application\Request\DeleteAccountRequest;

use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\UseCases\GetAccountUsers;
use Src\User\Domain\User\ValueObjects\UserIdVO;
use Tests\Account\Domain\Account\ValueObjects\AccountIdVOMother;


use Mockery;
use Mockery\MockInterface;
use Tests\Account\Domain\Account\AccountMother;
use Tests\Economy\Domain\Economy\EconomyMother;
use Tests\TestCase;

abstract class AccountUnitTestCase extends TestCase
{
    private MockInterface $mock;
    private MockInterface $economyMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock  = $this->repository();
        $this->economyMock = $this->economyRepository();
    }

    protected function shouldCreate(CreateAccountRequest $request)
    {
        $account_id = AccountIdVOMother::random();
        $account = AccountMother::random();

        $this->mock->shouldReceive('save')->andReturn($account);

        $this->economyMock->shouldReceive('save');

        $creator = new CreateAccount($this->mock, $this->economyMock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowAccountUuidRequest $request)
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

    protected function getAccountByUserId(ShowUserRequest $request)
    {
        $account = AccountMother::random();
        $accountResponse = AccountResponse::SelfAccountResponse($account);
        $accountResponses = new AccountResponses($accountResponse);

        $this->mock->shouldReceive('getAccountByUserId')->andReturns([$account]);

        $finder = new GetAccountByUserId($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($result, $accountResponses);
    }

    protected function shouldUpdate(string $uuid, UpdateAccountRequest $request)
    {
        $account_mother = AccountMother::random();
        $this->mock->shouldReceive('show')->andReturn($account_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateAccount($this->mock);
        $update->__invoke($uuid, $request);
    }

    /**
     * @throws JsonException
     */
    protected function insertUserFromAnAccount(ModifyUserAccountRequest $request)
    {

        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);
        $this->mock->shouldReceive('update');

        $deleteUserFromAnAccount = new InsertUserAccount($this->mock);
        $deleteUserFromAnAccount->__invoke($request);
    }

    /**
     * @throws JsonException
     */
    protected function deleteUserFromAnAccount(ModifyUserAccountRequest $request)
    {
        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);
        $this->mock->shouldReceive('update');

        $deleteUserFromAnAccount = new DeleteUserAccount($this->mock);
        $deleteUserFromAnAccount->__invoke($request);
    }

    /**
     * @throws JsonException
     */
    protected function insertOwnerAccount(ModifyOwnerAccountRequest $request)
    {
        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);
        $this->mock->shouldReceive('update');

        $deleteUserFromAnAccount = new InsertOwnerAccount($this->mock);
        $deleteUserFromAnAccount->__invoke($request);
    }

    /**
     * @throws JsonException
     */
    protected function deleteOwnerAccount(ModifyOwnerAccountRequest $request)
    {
        $account = AccountMother::random();

        $this->mock->shouldReceive('show')->andReturn($account);
        $this->mock->shouldReceive('update');

        $deleteUserFromAnAccount = new DeleteOwnerAccount($this->mock);
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

    private function economyRepository(): MockInterface | EconomyRepository
    {
        return Mockery::mock(EconomyRepository::class);
    }

}
