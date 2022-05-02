<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\TaskStatus;
use App\Models\Label;
use App\Models\User;

class TaskIndexFormFields
{
    public function compose(View $view)
    {
        $taskStatuses = TaskStatus::all()->pluck('name', 'id')->toArray();
        $users = User::all()->pluck('name', 'id')->toArray();

        $view->with('taskStatuses', $taskStatuses);
        $view->with('users', $users);
    }
}
