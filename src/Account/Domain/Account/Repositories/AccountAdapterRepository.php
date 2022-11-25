<?php

declare(strict_types=1);


namespace Src\Account\Domain\Account\Repositories;


use Src\Account\Domain\Account\Account;

interface AccountAdapterRepository
{
    public function accountModelAdapter(): ?Account;
}
