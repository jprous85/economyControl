<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Request\DeleteAccountRequest;
use Src\Account\Application\Request\ShowAccountUuidRequest;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;


final class DeleteAccount
{
    private ShowAccount $show__account;

    public function __construct(private AccountRepository $repository)
    {
        $this->show__account = new ShowAccount($this->repository);
    }

    public function __invoke(DeleteAccountRequest $request)
    {
        $response = ($this->show__account)(new ShowAccountUuidRequest($request->getUuid()));

        $account_id = new AccountIdVO($response->getId());
        $this->repository->delete($account_id);
    }
}
