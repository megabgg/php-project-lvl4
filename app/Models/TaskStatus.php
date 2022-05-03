<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $dates = ['created_at', 'updated_at'];


    public function task()
    {
        return $this->hasMany('App\Models\Task', 'status_id');
    }
}
