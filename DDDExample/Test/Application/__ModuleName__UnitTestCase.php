<?php

namespace Tests\__ModuleName__\Application;

use __BasePath__\__ModuleName__\Application\Request\Show__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\Request\Update__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\UseCases\Create__ModuleName__;
use __BasePath__\__ModuleName__\Application\UseCases\Show__ModuleName__;
use __BasePath__\__ModuleName__\Application\UseCases\ShowAll__ModuleName__;
use __BasePath__\__ModuleName__\Application\UseCases\Update__ModuleName__;
use __BasePath__\__ModuleName__\Application\UseCases\Delete__ModuleName__;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;

use __BasePath__\__ModuleName__\Application\Request\Create__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\Request\Delete__ModuleName__Request;

// -- uses of id vo mother -- //

use Mockery;
use Mockery\MockInterface;
use Src\Shared\Domain\Bus\Event\EventBus;
use Tests\__ModuleName__\Domain\__ModuleName__\__ModuleName__Mother;
use Tests\TestCase;

abstract class __ModuleName__UnitTestCase extends TestCase
{
    private MockInterface $mock;
    private MockInterface $eventBus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
        $this->eventBus = $this->eventBus();
    }

    protected function shouldCreate(Create__ModuleName__Request $request)
    {
        $__ModuleMinUnderscoreName___id = /* __ModuleName__IdVO */Mother::random();
        $this->mock->shouldReceive('saveTemporaryTask')->andReturn($__ModuleMinUnderscoreName___id);
        $this->eventBus->shouldReceive('publish');

        $creator = new Create__ModuleName__($this->mock, $this->eventBus);
        $creator->__invoke($request);
    }

    protected function shouldFind(Show__ModuleName__Request $request)
    {
        $__ModuleMinUnderscoreName__ = __ModuleName__Mother::random();

        $this->mock->shouldReceive('show')->andReturn($__ModuleMinUnderscoreName__);

        $finder = new Show__ModuleName__($this->mock);
        $finder->__invoke($request);
    }

    protected function shouldFindAll()
    {
        $this->mock->shouldReceive('showAll')->andReturns(array());

        $finder = new ShowAll__ModuleName__($this->mock);
        $finder->__invoke();
    }

    protected function shouldUpdate(int $id, Update__ModuleName__Request $request)
    {
        $__ModuleMinUnderscoreName___mother = __ModuleName__Mother::random();
        $this->mock->shouldReceive('show')->andReturn($__ModuleMinUnderscoreName___mother);

        $this->mock->shouldReceive('update');
        $this->eventBus->shouldReceive('publish');

        $update = new Update__ModuleName__($this->mock, $this->eventBus);
        $update->__invoke($id, $request);
    }

    protected function shouldDelete(Delete__ModuleName__Request $id)
    {
        $__ModuleMinUnderscoreName__ = __ModuleName__Mother::random();

        $this->mock->shouldReceive('show')->andReturns($__ModuleMinUnderscoreName__);
        $this->mock->shouldReceive('delete');

        $delete = new Delete__ModuleName__($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface | __ModuleName__Repository
    {
        return Mockery::mock(__ModuleName__Repository::class);
    }

    private function eventBus(): MockInterface | EventBus
    {
        return Mockery::mock(EventBus::class);
    }
}
