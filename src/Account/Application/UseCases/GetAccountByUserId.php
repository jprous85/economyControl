<?php

declare(strict_types=1);


namespace Src\Account\Application\UseCases;


use Src\Account\Application\Response\AccountResponse;
use Src\Account\Application\Response\AccountResponses;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\User\Application\Request\ShowUserRequest;
use Src\User\Domain\User\ValueObjects\UserIdVO;

final class GetAccountByUserId
{
    public function __construct(private AccountRepository $repository)
    {
    }

    public function __invoke(showUserRequest $request): AccountResponses
    {
        return new AccountResponses(...$this->map($this->repository->getAccountByUserId(new UserIdVO($request->getId()))));
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
