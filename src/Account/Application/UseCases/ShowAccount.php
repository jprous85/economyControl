<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\ShowAccountUuidRequest;
use Src\Account\Application\Response\AccountResponse;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;


final class ShowAccount
{
    public function __construct(private AccountRepository $repository)
    {}

    public function __invoke(ShowAccountUuidRequest $id): AccountResponse
    {
        $accountUuid = new AccountUuidVO($id->getUuid());
        $account = $this->repository->show($accountUuid);

        if (!$account)
        {
            throw new AccountNotExist($accountUuid->value());
        }

        return AccountResponse::SelfAccountResponse($account);
    }
}
