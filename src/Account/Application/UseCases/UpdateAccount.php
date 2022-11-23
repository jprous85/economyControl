<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\Account;
use Src\Shared\Domain\Bus\Event\EventBus;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;


final class UpdateAccount
{
    private ShowAccount $show__account;
    public function __construct(private AccountRepository $repository, private EventBus $eventBus)
    {
        $this->show__account = new ShowAccount($this->repository);
    }

    public function __invoke(int $id, UpdateAccountRequest $request)
    {
        $response = ($this->show__account)(new ShowAccountRequest($id));
        $account = AccountResponse::responseToEntity($response);

        $account = $this->mapper($account, $request);
        $this->repository->update($account);
        $this->eventBus->publish(...$account->pullDomainEvents());
    }

    private function mapper(Account $account, $request): Account
    {
			$id = $request->getId() ? new AccountIdVO($request->getId()) : $account->getId();
			$name = $request->getName() ? new AccountNameVO($request->getName()) : $account->getName();
			$users = $request->getUsers() ? new AccountUsersVO($request->getUsers()) : $account->getUsers();
			$active = $request->getActive() ? new AccountActiveVO($request->getActive()) : $account->getActive();
			$created_at = $request->getCreatedAt() ? new AccountCreatedAtVO($request->getCreatedAt()) : $account->getCreatedAt();
			$updated_at = $request->getUpdatedAt() ? new AccountUpdatedAtVO($request->getUpdatedAt()) : $account->getUpdatedAt();

        $account->update(
				$id,
				$name,
				$users,
				$active,
				$created_at,
				$updated_at,

        );

        return $account;
    }
}
