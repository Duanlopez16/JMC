<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Role
 *
 * @property $id
 * @property $uuid
 * @property $name
 * @property $description
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $user_creator
 * @property $user_last_update
 *
 * @property User $user
 * @property User $user
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{

    use HasFactory;

    protected $table = 'role';

    static $rules = [];

    /**
     * perPage
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'name', 'description', 'status', 'user_creator', 'user_last_update'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_creator()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_creator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_last_update()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_last_update');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'rol_id', 'id');
    }
}
