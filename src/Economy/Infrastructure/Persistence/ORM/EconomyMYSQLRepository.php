<?php

declare(strict_types=1);

namespace Src\Economy\Infrastructure\Persistence\ORM;

use Exception;
use Illuminate\Support\Facades\Auth;
use Src\Account\Infrastructure\Persistence\ORM\AccountORMModel;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;

use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;
use Src\Economy\Infrastructure\Adapter\EconomyAdapter;


final class EconomyMYSQLRepository implements EconomyRepository
{

    public function __construct(
        private EconomyORMModel $model,
        private AccountORMModel $accountModel
    )
    {
    }

    /**
     * @throws Exception
     */
    public function show(EconomyAccountUuidVO $accountUuid): ?Economy
    {
        $eloquent_economy = $this->model->where('account_uuid', $accountUuid->value())->first();

        if (!$this->isAdmin()) {
            $account = $this->getAccountByUuid($accountUuid->value());
            if ($account && !$eloquent_economy) {
                return null;
            }
            if (!$account) {
                throw new Exception('You are not an owner');
            };
        }
        return (new EconomyAdapter($eloquent_economy))->economyModelAdapter();
    }

    /**
     * @throws Exception
     */
    public function showAll(): array
    {
        $eloquent_economies = $this->model->all();
        $economies          = [];

        foreach ($eloquent_economies as $eloquent_economy)
        {
            if (!$this->isAdmin() && $eloquent_economy) {
                $account = $this->getAccountByUuid($eloquent_economy->account_uuid);
                if (!$account) {
                    throw new Exception('You are not owner');
                };
            }
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

    private function getAccountByUuid(string $uuid)
    {
        return $this->accountModel->where('uuid', $uuid)->where('users', 'like', '%' . Auth::id() . '%')->first();
    }

    private function isAdmin(): bool
    {
        return (Auth::user()->role->name === 'admin');
    }

    public function economyById(EconomyIdVO $id): ?Economy
    {
        $eloquent_economy = $this->model->find($id->value());
        return (new EconomyAdapter($eloquent_economy))->economyModelAdapter();
    }
}
