<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Account\Domain\Account\Account;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class EconomyORMModel extends Model
{
    // TODO:: check the correct table name !!
    protected $table = "economies";

    protected $guarded = [];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'id', 'account_id');
    }

}
