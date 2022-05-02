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

    public function created_by()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function assigned_to()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Models\Label','task_labels');
    }
}
