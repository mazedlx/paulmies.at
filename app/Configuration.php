<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configs';
    protected $fillable = ['value'];

    public function scopeConfig($query, $config)
    {
        return $query->where('config', '=', $config);
    }
}
