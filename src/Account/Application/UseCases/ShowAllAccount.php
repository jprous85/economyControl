<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Src\Account\Application\Response\AccountResponse;
use Src\Account\Application\Response\AccountResponses;
use Src\Account\Domain\Account\Repositories\AccountRepository;

final class ShowAllAccount
{
    public function __construct(private AccountRepository $repository)
    {}

    public function __invoke(): AccountResponses
    {
        return new AccountResponses(...$this->map($this->repository->showAll()));
    }

    private function map($accounts): array
    {
        $account_array = [];
        foreach ($accounts as $account) {
            $account_array[] = AccountResponse::SelfAccountResponse($account);
        }
        return $account_array;
    }
}
