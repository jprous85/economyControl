<?php

namespace Tests\Economy\Application;

use Src\Economy\Application\Request\AddEconomyIncomeRequest;
use Src\Economy\Application\Request\EconomyAccountUuidRequest;
use Src\Economy\Application\Request\EconomyUuidRequest;
use Src\Economy\Application\Request\ShowEconomyRequest;
use Src\Economy\Application\Request\UpdateEconomyRequest;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Application\Response\EconomyResponses;
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
use Tests\Economy\Domain\Economy\EconomyMother;
use Tests\TestCase;

abstract class EconomyUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock = $this->repository();
    }

    protected function shouldCreate(CreateEconomyRequest $request)
    {
        $economy_id = EconomyIdVOMother::random();
        $this->mock->shouldReceive('save')->andReturn($economy_id);

        $creator = new CreateEconomy($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(EconomyAccountUuidRequest $request)
    {
        $economy = EconomyMother::random();

        $economyResponse = EconomyResponse::SelfEconomyResponse($economy);

        $this->mock->shouldReceive('show')->andReturn($economy);

        $finder = new ShowEconomy($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($result, $economyResponse);
    }

    protected function shouldFindAll()
    {
        $economy1 = EconomyMother::random();
        $economy2 = EconomyMother::random();

        $economyResponse1 = EconomyResponse::SelfEconomyResponse($economy1);
        $economyResponse2 = EconomyResponse::SelfEconomyResponse($economy2);

        $economyResponse = new EconomyResponses($economyResponse1, $economyResponse2);

        $this->mock->shouldReceive('showAll')->andReturns([$economy1, $economy2]);

        $finder = new ShowAllEconomy($this->mock);
        $result = $finder->__invoke();

        $this->assertEquals($result, $economyResponse);
    }

    protected function shouldUpdate(int $id, UpdateEconomyRequest $request)
    {
        $economy_mother = EconomyMother::random();
        $this->mock->shouldReceive('economyById')->andReturn($economy_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateEconomy($this->mock);
        $update->__invoke($id, $request);
    }

    protected function shouldAddIncome(AddEconomyIncomeRequest $request)
    {
        $economy_mother = EconomyMother::random();
        $this->mock->shouldReceive('economyById')->andReturn($economy_mother);
        $this->mock->shouldReceive('update');
        $this->assertTrue(true);
    }

    protected function shouldDelete(DeleteEconomyRequest $id)
    {
        $this->mock->shouldReceive('delete');

        $delete = new DeleteEconomy($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface|EconomyRepository
    {
        return Mockery::mock(EconomyRepository::class);
    }
}
