<?php

declare(strict_types=1);


namespace Src\Account\Application\UseCases;


use JsonException;
use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;

final class InsertUserAccount
{
    public function __construct(private AccountRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(ModifyUserAccountRequest $request)
    {
        $id = new AccountIdVO($request->accountId());

        $account = $this->repository->show($id);

        if (!$account)
        {
            throw new AccountNotExist($id->value());
        }

        $account->insertUser($request->userId());
        $this->repository->update($account);
    }
}
