<?php

namespace Tests\Role\Application;

use Src\Role\Application\Request\ShowRoleRequest;
use Src\Role\Application\Request\UpdateRoleRequest;
use Src\Role\Application\Response\RoleResponse;
use Src\Role\Application\Response\RoleResponses;
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
use Tests\Role\Domain\Role\RoleMother;
use Tests\TestCase;

abstract class RoleUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock = $this->repository();
    }

    protected function shouldCreate(CreateRoleRequest $request)
    {
        $role_id = RoleIdVOMother::random();
        $this->mock->shouldReceive('save')->andReturn($role_id);

        $creator = new CreateRole($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowRoleRequest $request)
    {
        $role         = RoleMother::random();
        $roleResponse = RoleResponse::SelfRoleResponse($role);

        $this->mock->shouldReceive('show')->andReturn($role);

        $finder = new ShowRole($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($result, $roleResponse);
    }

    protected function shouldFindAll()
    {
        $role1 = RoleMother::random();
        $role2 = RoleMother::random();

        $roleResponse1 = RoleResponse::SelfRoleResponse($role1);
        $roleResponse2 = RoleResponse::SelfRoleResponse($role2);

        $roleResponses = new RoleResponses($roleResponse1, $roleResponse2);

        $this->mock->shouldReceive('showAll')->andReturns([$role1, $role2]);

        $finder = new ShowAllRole($this->mock);
        $result = $finder->__invoke();

        $this->assertEquals($result, $roleResponses);
    }

    protected function shouldUpdate(int $id, UpdateRoleRequest $request)
    {
        $role_mother = RoleMother::random();
        $this->mock->shouldReceive('show')->andReturn($role_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateRole($this->mock);
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

    private function repository(): MockInterface|RoleRepository
    {
        return Mockery::mock(RoleRepository::class);
    }
}
