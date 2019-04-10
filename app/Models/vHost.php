<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vHost extends Model
{
    protected $table = 'vhosts';

    protected $fillable = [
        'name', 'ip_address', 'token', 'port'
    ];

    public function getTokenAttribute($value) {
        return decrypt($value);
    }

    public function setTokenAttribute($value) {
        $this->attributes['token'] = encrypt($value);
    }

}
