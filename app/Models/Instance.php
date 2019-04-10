<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{

    protected $fillable = [
        'user_id', 'name', 'configuration',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bots()
    {
        return $this->hasMany(Bot::class, 'instance_id', 'id');
    }

    public function getConfigurationAttribute($value) {
        return json_decode($value);
    }

    public function setConfigurationAttribute($value) {
        $this->attributes['configuration'] = json_encode($value);
    }

}
