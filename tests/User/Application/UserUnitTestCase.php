<?php

namespace Tests\User\Application;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\UseCases\CreateUser;
use Src\User\Application\UseCases\ShowUser;
use Src\User\Application\UseCases\ShowAllUser;
use Src\User\Application\UseCases\UpdateUser;
use Src\User\Application\UseCases\DeleteUser;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Application\Request\CreateUserRequest;
use Src\User\Application\Request\DeleteUserRequest;

use Tests\User\Domain\User\ValueObjects\UserIdVOMother;


use Mockery;
use Mockery\MockInterface;
use Src\Shared\Domain\Bus\Event\EventBus;
use Tests\User\Domain\User\UserMother;
use Tests\TestCase;

abstract class UserUnitTestCase extends TestCase
{
    private MockInterface $mock;
    private MockInterface $eventBus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
        $this->eventBus = $this->eventBus();
    }

    protected function shouldCreate(CreateUserRequest $request)
    {
        $user_id = UserIdVOMother::random();
        $this->mock->shouldReceive('saveTemporaryTask')->andReturn($user_id);
        $this->eventBus->shouldReceive('publish');

        $creator = new CreateUser($this->mock, $this->eventBus);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowUserRequest $request)
    {
        $user = UserMother::random();

        $this->mock->shouldReceive('show')->andReturn($user);

        $finder = new ShowUser($this->mock);
        $finder->__invoke($request);
    }

    protected function shouldFindAll()
    {
        $this->mock->shouldReceive('showAll')->andReturns(array());

        $finder = new ShowAllUser($this->mock);
        $finder->__invoke();
    }

    protected function shouldUpdate(int $id, UpdateUserRequest $request)
    {
        $user_mother = UserMother::random();
        $this->mock->shouldReceive('show')->andReturn($user_mother);

        $this->mock->shouldReceive('update');
        $this->eventBus->shouldReceive('publish');

        $update = new UpdateUser($this->mock, $this->eventBus);
        $update->__invoke($id, $request);
    }

    protected function shouldDelete(DeleteUserRequest $id)
    {
        $user = UserMother::random();

        $this->mock->shouldReceive('show')->andReturns($user);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteUser($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface | UserRepository
    {
        return Mockery::mock(UserRepository::class);
    }

    private function eventBus(): MockInterface | EventBus
    {
        return Mockery::mock(EventBus::class);
    }
}
