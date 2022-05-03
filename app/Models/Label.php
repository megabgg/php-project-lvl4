<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $dates = ['created_at', 'updated_at'];


    public function task()
    {
        return $this->belongsToMany('App\Models\Label', 'task_labels');
    }
}
