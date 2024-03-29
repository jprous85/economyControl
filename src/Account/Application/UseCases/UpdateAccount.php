<?php

declare(strict_types=1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\ShowAccountUuidRequest;
use Src\Account\Application\Request\UpdateAccountRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\Account;

use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;


final class UpdateAccount
{
    private ShowAccount $show__account;

    public function __construct(private AccountRepository $repository)
    {
        $this->show__account = new ShowAccount($this->repository);
    }

    public function __invoke(string $uuid, UpdateAccountRequest $request)
    {
        $response = ($this->show__account)(new ShowAccountUuidRequest($uuid));
        $account  = AccountResponse::responseToEntity($response);

        $account = $this->mapper($account, $request);
        $this->repository->update($account);
    }

    private function mapper(Account $account, $request): Account
    {
        $name          = $request->getName() ? new AccountNameVO($request->getName()) : $account->getName();
        $description   = $request->getDescription() ? new AccountDescriptionVO($request->getDescription()) : $account->getDescription();
        $active        = new AccountActiveVO($request->getActive());

        $account->update(
            $name,
            $description,
            $active
        );

        return $account;
    }
}
