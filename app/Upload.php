<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The fillable attributrs for an upload
     * @var array
     */
    protected $fillable = ['content_id', 'description', 'filename', 'sort'];

    /**
     * [content description]
     * @access public
     * @return \Illuminate\Database\Elqouent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo('App\Content');
    }
}
