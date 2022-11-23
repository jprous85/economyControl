<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\Repositories\AccountRepository;

use Src\Shared\Domain\Bus\Event\EventBus;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;


final class CreateAccount
{

    public function __construct(private AccountRepository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(CreateAccountRequest $request): int
    {
        $account = self::mapper($request);
        $account_id = $this->repository->save($account);
        $this->eventBus->publish(...$account->pullDomainEvents());
        return $account_id->value();
    }

    private function mapper(CreateAccountRequest $request): Account
    {
        // TODO:: check with VO and return it
        return Account::create(
			new AccountIdVO($request->getId()),
			new AccountNameVO($request->getName()),
			new AccountUsersVO($request->getUsers()),
			new AccountActiveVO($request->getActive()),
			new AccountCreatedAtVO($request->getCreatedAt()),
			new AccountUpdatedAtVO($request->getUpdatedAt()),

        );
    }
}
