<?php

declare(strict_types=1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\Account;

use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;


final class UpdateAccount
{
    private ShowAccount $show__account;

    public function __construct(private AccountRepository $repository)
    {
        $this->show__account = new ShowAccount($this->repository);
    }

    public function __invoke(int $id, UpdateAccountRequest $request)
    {
        $response = ($this->show__account)(new ShowAccountRequest($id));
        $account  = AccountResponse::responseToEntity($response);

        $account = $this->mapper($account, $request);
        $this->repository->update($account);
    }

    private function mapper(Account $account, $request): Account
    {
        $name   = $request->getName() ? new AccountNameVO($request->getName()) : $account->getName();
        $users  = $request->getUsers() ? new AccountUsersVO(json_encode($request->getUsers())) : $account->getUsers();
        $active = $request->getActive() ? new AccountActiveVO($request->getActive()) : $account->getActive();

        $account->update(
            $name,
            $users,
            $active
        );

        return $account;
    }
}
