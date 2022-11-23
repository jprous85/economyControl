<?php

declare(strict_types = 1);

namespace Src\Account\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class AccountORMModel extends Model
{
    // TODO:: check the correct table name !!
    protected $table = "accounts";

    protected $guarded = [];

}
