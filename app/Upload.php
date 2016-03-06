<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = ['content_id', 'description', 'filename', 'sort'];

    public function content()
    {
        return $this->belongsTo('App\Content');
    }
}
