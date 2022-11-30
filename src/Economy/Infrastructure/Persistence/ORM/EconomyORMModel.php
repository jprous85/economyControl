<?php

declare(strict_types = 1);

namespace Src\Economy\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class EconomyORMModel extends Model
{
    // TODO:: check the correct table name !!
    protected $table = "economies";

    protected $guarded = [];

}
