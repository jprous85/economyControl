<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Economy\Domain\Economy\Economy;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class AccountORMModel extends Model
{
    protected $table = "accounts";

    protected $guarded = [];


    public function economies(): HasMany
    {
        return $this->hasMany(Economy::class);
    }

}
