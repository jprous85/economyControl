<?php

declare(strict_types=1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\Account;

use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
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
        $name          = $request->getName() ? new AccountNameVO($request->getName()) : $account->getName();
        $description   = $request->getDescription() ? new AccountDescriptionVO($request->getDescription()) : $account->getDescription();
        $users         = $request->getUsers() ? new AccountUsersVO(json_encode($request->getUsers())) : $account->getUsers();
        $ownersAccount = $request->getOwnersAccount() ? new AccountOwnersAccountVO(json_encode($request->getOwnersAccount())) : $account->getOwnersAccount();
        $active        = $request->getActive() ? new AccountActiveVO($request->getActive()) : $account->getActive();

        $account->update(
            $name,
            $description,
            $users,
            $ownersAccount,
            $active
        );

        return $account;
    }
}
