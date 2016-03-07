<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    /**
     * The model's table name
     * @var string
     */
    protected $table = 'configs';

    /**
     * The fillable attributes for a config
     * @var array
     */
    protected $fillable = ['value'];

    /**
     * Get the corresponding config
     *
     * @access public
     * @param  \Illuminate\Database\Query\Builder $query
     * @param  string $config
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeConfig($query, $config)
    {
        return $query->where('config', '=', $config);
    }
}
