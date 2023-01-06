<?php

declare(strict_types = 1);

namespace Src\Account\Application\UseCases;

use Carbon\Carbon;
use Src\Account\Application\Request\CreateAccountRequest;
use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\Repositories\AccountRepository;


use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;


final class CreateAccount
{

    public function __construct(
        private AccountRepository $repository,
        private EconomyRepository $economyRepository
    )
    {
    }

    public function __invoke(CreateAccountRequest $request): void
    {
        $account = self::mapper($request);
        $account = $this->repository->save($account);

        $economy = self::economyMapper($account);
        $this->economyRepository->save($economy);
    }

    private function mapper(CreateAccountRequest $request): Account
    {
        return Account::create(
			new AccountNameVO($request->getName()),
            new AccountDescriptionVO($request->getDescription()),
			new AccountUsersVO($request->getUsers()),
            new AccountOwnersAccountVO($request->getOwnersAccount())
        );
    }

    private function economyMapper(Account $account): Economy
    {
        return Economy::create(
            new EconomyStartMonthVO(Carbon::now()->startOfMonth()->format('Y-m-d h:i:s')),
            new EconomyEndMonthVO(Carbon::now()->endOfMonth()->format('Y-m-d h:i:s')),
            new EconomyAccountUuidVO($account->getUuid()->value()),
            new EconomyEconomicManagementVO(CryptoAndDecrypt::encrypt(Economy::economyManagementStructure()))        );
    }
}
