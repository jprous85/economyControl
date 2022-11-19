<?php

namespace Tests\Role\Application;

use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Application\Request\UpdateRoleRequest;
use Src\Role\Application\UseCases\CreateRole;
use Src\Role\Application\UseCases\ShowRole;
use Src\Role\Application\UseCases\ShowAllRole;
use Src\Role\Application\UseCases\UpdateRole;
use Src\Role\Application\UseCases\DeleteRole;
use Src\Role\Domain\Role\Repositories\RoleRepository;

use Src\Role\Application\Request\CreateRoleRequest;
use Src\Role\Application\Request\DeleteRoleRequest;

use Tests\Role\Domain\Role\ValueObjects\RoleIdVOMother;


use Mockery;
use Mockery\MockInterface;
use Src\Shared\Domain\Bus\Event\EventBus;
use Tests\Role\Domain\Role\RoleMother;
use Tests\TestCase;

abstract class RoleUnitTestCase extends TestCase
{
    private MockInterface $mock;
    private MockInterface $eventBus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
        $this->eventBus = $this->eventBus();
    }

    protected function shouldCreate(CreateRoleRequest $request)
    {
        $role_id = RoleIdVOMother::random();
        $this->mock->shouldReceive('saveTemporaryTask')->andReturn($role_id);
        $this->eventBus->shouldReceive('publish');

        $creator = new CreateRole($this->mock, $this->eventBus);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowRoleRequest $request)
    {
        $role = RoleMother::random();

        $this->mock->shouldReceive('show')->andReturn($role);

        $finder = new ShowRole($this->mock);
        $finder->__invoke($request);
    }

    protected function shouldFindAll()
    {
        $this->mock->shouldReceive('showAll')->andReturns(array());

        $finder = new ShowAllRole($this->mock);
        $finder->__invoke();
    }

    protected function shouldUpdate(int $id, UpdateRoleRequest $request)
    {
        $role_mother = RoleMother::random();
        $this->mock->shouldReceive('show')->andReturn($role_mother);

        $this->mock->shouldReceive('update');
        $this->eventBus->shouldReceive('publish');

        $update = new UpdateRole($this->mock, $this->eventBus);
        $update->__invoke($id, $request);
    }

    protected function shouldDelete(DeleteRoleRequest $id)
    {
        $role = RoleMother::random();

        $this->mock->shouldReceive('show')->andReturns($role);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteRole($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface | RoleRepository
    {
        return Mockery::mock(RoleRepository::class);
    }

    private function eventBus(): MockInterface | EventBus
    {
        return Mockery::mock(EventBus::class);
    }
}
