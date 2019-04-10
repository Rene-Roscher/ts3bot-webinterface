<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    protected $fillable = [
        'instance_id', 'configuration',
    ];

    public function instance()
    {
        return $this->belongsTo(Instance::class, 'instance_id','id');
    }

    public function getConfigurationAttribute($value) {
        return json_decode($value);
    }

    public function setConfigurationAttribute($value) {
        $this->attributes['configuration'] = json_encode($value);
    }

}
