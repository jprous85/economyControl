<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\Repositories\AccountRepository;


use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;


final class CreateAccount
{

    public function __construct(private AccountRepository $repository)
    {
    }

    public function __invoke(CreateAccountRequest $request): void
    {
        $account = self::mapper($request);
        $this->repository->save($account);
    }

    private function mapper(CreateAccountRequest $request): Account
    {
        return Account::create(
			new AccountNameVO($request->getName()),
			new AccountUsersVO($request->getUsers()),
            new AccountOwnersAccountVO($request->getOwnersAccount())
        );
    }
}
