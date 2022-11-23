<?php

namespace Tests\Account\Application;

use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\UseCases\CreateAccount;
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
use Src\Shared\Domain\Bus\Event\EventBus;
use Tests\Account\Domain\Account\AccountMother;
use Tests\TestCase;

abstract class AccountUnitTestCase extends TestCase
{
    private MockInterface $mock;
    private MockInterface $eventBus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
        $this->eventBus = $this->eventBus();
    }

    protected function shouldCreate(CreateAccountRequest $request)
    {
        $account_id = AccountIdVOMother::random();
        $this->mock->shouldReceive('saveTemporaryTask')->andReturn($account_id);
        $this->eventBus->shouldReceive('publish');

        $creator = new CreateAccount($this->mock, $this->eventBus);
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
        $this->eventBus->shouldReceive('publish');

        $update = new UpdateAccount($this->mock, $this->eventBus);
        $update->__invoke($id, $request);
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

    private function eventBus(): MockInterface | EventBus
    {
        return Mockery::mock(EventBus::class);
    }
}
