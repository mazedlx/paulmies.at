<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The fillable attribute for a slide
     * @var array
     */
    protected $fillable = ['title', 'text', 'filename', 'sort'];
}
