<?php

declare(strict_types=1);


namespace Src\Account\Application\UseCases;


use JsonException;
use Src\Account\Application\Request\ModifyUserAccountRequest;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;

final class DeleteUserAccount
{
    public function __construct(private AccountRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(ModifyUserAccountRequest $request)
    {
        $uuid = new AccountUuidVO($request->accountUuid());

        $account = $this->repository->show($uuid);

        if (!$account)
        {
            throw new AccountNotExist($uuid->value());
        }

        $account->deleteUser($request->userId());
        $this->repository->update($account);
    }
}
