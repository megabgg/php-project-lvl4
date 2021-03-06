<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'created_by_id',
        'assigned_to_id'

    ];

    protected $dates = ['created_at', 'updated_at'];


    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by_id');
    }

    public function assigned()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Models\Label', 'task_labels');
    }
}
