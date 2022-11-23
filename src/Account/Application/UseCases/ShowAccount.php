<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;


final class ShowAccount
{
    public function __construct(private AccountRepository $repository)
    {}

    public function __invoke(ShowAccountRequest $id): AccountResponse
    {
        $accountID = new AccountIdVO($id->getId());
        $account = $this->repository->show($accountID);

        if (!$account)
        {
            throw new AccountNotExist($accountID->value());
        }

        return AccountResponse::SelfAccountResponse($account);
    }
}
