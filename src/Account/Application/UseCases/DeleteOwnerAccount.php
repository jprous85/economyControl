<?php

declare(strict_types=1);


namespace Src\Account\Application\UseCases;


use JsonException;
use Src\Account\Application\Request\ModifyOwnerAccountRequest;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;

final class DeleteOwnerAccount
{
    public function __construct(private AccountRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(ModifyOwnerAccountRequest $request)
    {
        $uuid = new AccountUuidVO($request->accountUuid());

        $account = $this->repository->show($uuid);

        if (!$account)
        {
            throw new AccountNotExist($uuid->value());
        }

        $account->deleteOwner($request->userId());
        $this->repository->update($account);
    }
}
