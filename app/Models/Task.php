<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [ 'name',
                            'description',
                            'planning_time',
                            'doing_time',
                            'branch',
                            'status'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'tasks_users');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
