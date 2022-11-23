<?php

declare(strict_types=1);

namespace Src\Economy\Infrastructure\Persistence\ORM;

use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountIdVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyActiveVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyCreatedAtVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyUpdatedAtVO;


final class EconomyMYSQLRepository implements EconomyRepository
{

    public function __construct(private EconomyORMModel $model)
    {
    }

    public function show(EconomyIdVO $id): ?Economy
    {
        $query = $this->model->find($id->value());
        return self::fillDataMapper($query);
    }

    public function showAll(): array
    {
        $eloquent_economyes = $this->model->all();
        $economyes               = [];

        foreach ($eloquent_economyes as $eloquent_economy) {
            $economyes[] = self::fillDataMapper($eloquent_economy);
        }
        return $economyes;

    }

    public function save(Economy $economy): EconomyIdVO
    {
        $response    = $this->model->create($economy->getPrimitives());
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

    private static function fillDataMapper($economy): ?Economy
    {
        return $economy ? new Economy(
			new EconomyIdVO($economy->id),
			new EconomyStartMonthVO($economy->start_month),
			new EconomyEndMonthVO($economy->end_month),
			new EconomyAccountIdVO($economy->account_id),
			new EconomyEconomicManagementVO($economy->economic_management),
			new EconomyActiveVO($economy->active),
			new EconomyCreatedAtVO($economy->created_at),
			new EconomyUpdatedAtVO($economy->updated_at),

        ) : null;
    }
}
