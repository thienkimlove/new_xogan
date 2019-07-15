<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'name',
        'post_id',
        'email',
        'content',
        'status',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
