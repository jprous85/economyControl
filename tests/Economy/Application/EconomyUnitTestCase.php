<?php

namespace Tests\Economy\Application;

use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\UseCases\CreateEconomy;
use Src\Economy\Application\UseCases\ShowEconomy;
use Src\Economy\Application\UseCases\ShowAllEconomy;
use Src\Economy\Application\UseCases\UpdateEconomy;
use Src\Economy\Application\UseCases\DeleteEconomy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

use Src\Economy\Application\Request\CreateEconomyRequest;
use Src\Economy\Application\Request\DeleteEconomyRequest;

use Tests\Economy\Domain\Economy\ValueObjects\EconomyIdVOMother;


use Mockery;
use Mockery\MockInterface;
use Src\Shared\Domain\Bus\Event\EventBus;
use Tests\Economy\Domain\Economy\EconomyMother;
use Tests\TestCase;

abstract class EconomyUnitTestCase extends TestCase
{
    private MockInterface $mock;
    private MockInterface $eventBus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock   = $this->repository();
        $this->eventBus = $this->eventBus();
    }

    protected function shouldCreate(CreateEconomyRequest $request)
    {
        $economy_id = EconomyIdVOMother::random();
        $this->mock->shouldReceive('saveTemporaryTask')->andReturn($economy_id);
        $this->eventBus->shouldReceive('publish');

        $creator = new CreateEconomy($this->mock, $this->eventBus);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowEconomyRequest $request)
    {
        $economy = EconomyMother::random();

        $this->mock->shouldReceive('show')->andReturn($economy);

        $finder = new ShowEconomy($this->mock);
        $finder->__invoke($request);
    }

    protected function shouldFindAll()
    {
        $this->mock->shouldReceive('showAll')->andReturns(array());

        $finder = new ShowAllEconomy($this->mock);
        $finder->__invoke();
    }

    protected function shouldUpdate(int $id, UpdateEconomyRequest $request)
    {
        $economy_mother = EconomyMother::random();
        $this->mock->shouldReceive('show')->andReturn($economy_mother);

        $this->mock->shouldReceive('update');
        $this->eventBus->shouldReceive('publish');

        $update = new UpdateEconomy($this->mock, $this->eventBus);
        $update->__invoke($id, $request);
    }

    protected function shouldDelete(DeleteEconomyRequest $id)
    {
        $economy = EconomyMother::random();

        $this->mock->shouldReceive('show')->andReturns($economy);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteEconomy($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface | EconomyRepository
    {
        return Mockery::mock(EconomyRepository::class);
    }

    private function eventBus(): MockInterface | EventBus
    {
        return Mockery::mock(EventBus::class);
    }
}
