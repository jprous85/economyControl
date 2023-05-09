<?php

declare(strict_types=1);


namespace Src\Account\Application\UseCases;


use Carbon\Carbon;
use Src\Account\Application\Request\ShowAccountUuidRequest;
use Src\Account\Domain\Account\Account;
use Src\Account\Domain\Account\AccountNotExist;
use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;
use Src\Economy\Application\Response\EconomyResponse;
use Src\Economy\Domain\Economy\AccountUuidEconomyNotExist;
use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Domain\Economy\ValueObjects\EconomyAccountUuidVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEconomicManagementVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyEndMonthVO;
use Src\Economy\Domain\Economy\ValueObjects\EconomyStartMonthVO;
use Src\Shared\Infrastructure\CryptoAndDecrypt\CryptoAndDecrypt;

final class DuplicateAccount
{
    public function __construct(
        private readonly AccountRepository $accountRepository,
        private readonly EconomyRepository $economyRepository,
    )
    {
    }

    /**
     * @throws \JsonException
     */
    public function __invoke(ShowAccountUuidRequest $request)
    {
        $account = $this->accountRepository->show(new AccountUuidVO($request->getUuid()));

        if (!$account) {
            throw new AccountNotExist($request->getUuid());
        }

        $accountEconomies = $this->economyRepository->show(new EconomyAccountUuidVO($account->getUuid()->value()));

        if (!$accountEconomies) {
            throw new AccountUuidEconomyNotExist($account->getUuid()->value());
        }

        $economyResponse = EconomyResponse::SelfEconomyResponse($accountEconomies);

        $accountMapper = self::mapper($account);
        $newAccount = $this->accountRepository->save($accountMapper);

        $economy = self::economyMapper($newAccount);

        $this->filteredActiveEconomies($economy, $economyResponse);
        $economy->encryptedEconomyManagement(CryptoAndDecrypt::encrypt($economy->getEconomicManagement()->value()));

        $this->economyRepository->save($economy);
    }

    /**
     * @throws \JsonException
     */
    private function filteredActiveEconomies(Economy $economy, EconomyResponse $accountEconomies): void
    {
        $this->getFixedEconomy($economy, 'addIncome', $accountEconomies->getEconomicManagement()['incomes']);
        $this->getFixedEconomy($economy, 'addSpent', $accountEconomies->getEconomicManagement()['expenses']);
    }

    private function getFixedEconomy(Economy $economy, string $method, array $charges): void
    {
        foreach ($charges as $charge) {
            if ($charge['fixed']) {
                $economy->$method($charge);
            }
        }
    }

    private function mapper(Account $account): Account
    {
        return Account::create(
            new AccountNameVO($account->getName()->value() . ' [copy]'),
            new AccountDescriptionVO($account->getDescription()->value()),
            new AccountUsersVO($account->getUsers()->value()),
            new AccountOwnersAccountVO($account->getOwnersAccount()->value())
        );
    }

    private function economyMapper(Account $account): Economy
    {
        return Economy::create(
            new EconomyStartMonthVO(Carbon::now()->startOfMonth()->format('Y-m-d h:i:s')),
            new EconomyEndMonthVO(Carbon::now()->endOfMonth()->format('Y-m-d h:i:s')),
            new EconomyAccountUuidVO($account->getUuid()->value()),
            new EconomyEconomicManagementVO(Economy::economyManagementStructure()));
    }
}
