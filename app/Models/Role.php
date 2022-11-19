<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'roles';

    /**
     * The model's default values for attributes.
     * @var array
     */
    protected $attributes = [
        'active' => 1,
    ];

    /**
     * Attributes that can't be mass assigned.
     * @var array
     */
    protected $guarded = [];

    /**
     * Set One To Many Relationship with Users Class (One Role Has Many Users)
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
}
