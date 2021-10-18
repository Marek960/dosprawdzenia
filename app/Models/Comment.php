<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [ 
                            'description'
    ];

    public function task(){
        return $this->belongsTo('App\Models\Task');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
