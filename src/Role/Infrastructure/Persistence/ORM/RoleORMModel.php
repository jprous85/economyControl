<?php

declare(strict_types = 1);

namespace Src\Role\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class RoleORMModel extends Model
{
    // TODO:: check the correct table name !!
    protected $table = "roles";

    protected $guarded = [];

    public function user(): HasOne
    {
        return $this->hasOne(UserORMModel::class, 'id', 'role_id');
    }

}
