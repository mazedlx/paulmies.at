<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The fillable attributes for a content
     * @var array
     */
    protected $fillable = ['title', 'attribute', 'teaser', 'content', 'sort'];

    /**
     * Get uploads for a content
     *
     * @access public
     * @return \Illuminate\Database\Elqouent\Relations\HasMany
     */
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
}
