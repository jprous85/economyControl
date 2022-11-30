<?php

declare(strict_types=1);

namespace Src\Economy\Infrastructure\Persistence\ORM;

use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Infrastructure\Adapter\EconomyAdapter;


final class EconomyMYSQLRepository implements EconomyRepository
{

    public function __construct(private EconomyORMModel $model)
    {
    }

    public function show(EconomyIdVO $id): ?Economy
    {
        $eloquent_economy = $this->model->find($id->value());
        return (new EconomyAdapter($eloquent_economy))->economyModelAdapter();
    }

    public function showAll(): array
    {
        $eloquent_economies = $this->model->all();
        $economies          = [];

        foreach ($eloquent_economies as $eloquent_economy) {
            $economies[] = (new EconomyAdapter($eloquent_economy))->economyModelAdapter();
        }
        return $economies;
    }

    public function save(Economy $economy): EconomyIdVO
    {
        $response = $this->model->create($economy->getPrimitives());
        return new EconomyIdVO($response->id);
    }

    public function update(Economy $economy): void
    {
        $update_economy = $this->model->find($economy->getId()->value());
        $update_economy->update($economy->getPrimitives());

    }

    public function delete(EconomyIdVO $id): void
    {
        $economy = $this->model->find($id->value());
        $economy->delete();
    }
}
