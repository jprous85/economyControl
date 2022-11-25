<?php

declare(strict_types=1);


namespace Src\Account\Application\UseCases;


use JsonException;
use Src\Account\Application\Request\DeleteUserAccountRequest;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;

final class DeleteUserAccount
{
    public function __construct(private AccountRepository $repository)
    {
    }

    /**
     * @throws JsonException
     */
    public function __invoke(DeleteUserAccountRequest $request)
    {
        $id = new AccountIdVO($request->accountId());

        $account = $this->repository->show($id);

        if (!$account)
        {
            throw new AccountNotExist($id->value());
        }

        $account->deleteUser($request->userId());
        $this->repository->update($account);
    }
}
