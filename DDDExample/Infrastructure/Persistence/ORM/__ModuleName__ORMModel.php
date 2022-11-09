<?php

declare(strict_types = 1);

namespace __BasePath__\__ModuleName__\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class __ModuleName__ORMModel extends Model
{
    // TODO:: check the correct table name !!
    protected $table = "__ModuleMinUnderscoreNameWithPlural__";

    protected $guarded = [];

}
