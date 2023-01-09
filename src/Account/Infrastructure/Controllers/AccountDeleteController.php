<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Controllers;

use Src\Account\Application\Request\DeleteAccountRequest;
use Src\Account\Application\Request\ShowAccountRequest;
use Src\Account\Application\UseCases\DeleteAccount;

use Src\Account\Application\UseCases\ShowAccount;
use Src\Economy\Application\Request\DeleteEconomyRequest;
use Src\Economy\Application\Request\EconomyAccountUuidRequest;
use Src\Economy\Application\UseCases\DeleteEconomy;
use Src\Economy\Application\UseCases\ShowEconomy;
use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AccountDeleteController extends ReturnsMiddleware
{
    public function __construct(
        private ShowAccount $show_account,
        private ShowEconomy $showEconomy,
        private DeleteAccount $delete,
        private DeleteEconomy $deleteEconomy
    )
    {}

    public function delete(int $id): JsonResponse
    {
        $account = ($this->show_account)(new ShowAccountRequest($id));
        $economy = ($this->showEconomy)(new EconomyAccountUuidRequest($account->getUuid()));

        if ($economy) {
            ($this->deleteEconomy)(new DeleteEconomyRequest($economy->getId()));
        }

        $request = new DeleteAccountRequest($id);
        ($this->delete)($request);
        return $this->successResponse('Account deleted');
    }
}
