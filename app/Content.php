<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title', 'attribute', 'teaser', 'content', 'sort'];

    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
}
