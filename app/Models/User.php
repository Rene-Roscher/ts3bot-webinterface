<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Modele
 * @property mixed id
 * @property mixed email
 * @property mixed password
 * @property mixed role
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if user has role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role == $role;
    }

    /**
     * Determine if this model doesn't own the given model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  mixed                               $foreignKey
     * @param  bool                                $strict
     *
     * @return bool
     */
    public function doesntOwn($model, $foreignKey = null, $strict = false )
    {
        return !$this->owns($model, $foreignKey, $strict);
    }

    /**
     * Determine if this model owns the given model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  mixed                               $foreignKey
     * @param  bool                                $strict
     *
     * @return bool
     */
    public function owns($model, $foreignKey = null, $strict = false )
    {
        $foreignKey = $foreignKey ?: $this->getForeignKey();
        if ( $strict ) {
            return $this->getKey() === $model->{$foreignKey};
        }

        return $this->getKey() == $model->{$foreignKey};
    }

}
