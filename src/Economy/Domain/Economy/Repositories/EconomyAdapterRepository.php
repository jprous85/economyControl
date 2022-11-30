<?php

namespace Src\Economy\Domain\Economy\Repositories;

use Src\Economy\Domain\Economy\Economy;

interface EconomyAdapterRepository
{
    public function economyModelAdapter(): ?Economy;
}
