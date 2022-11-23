<?php

namespace Src\Economy\Domain\Economy\Repositories;

use Src\Economy\Domain\Economy\Economy;
use Src\Economy\Domain\Economy\ValueObjects\EconomyIdVO;

interface EconomyRepository
{
    public function show(EconomyIdVO $id): ?Economy;

    public function showAll(): array;

    public function save(Economy $economy): EconomyIdVO;

    public function update(Economy $economy): void;

    public function delete(EconomyIdVO $id): void;
}
