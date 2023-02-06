<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Src\Role\Infrastructure\Persistence\ORM\RoleORMModel;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class UserORMModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(RoleORMModel::class, 'role_id', 'id');
    }

    // TODO:: make function for getting information about his configuration
}
