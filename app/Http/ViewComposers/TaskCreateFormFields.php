<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\TaskStatus;
use App\Models\Label;
use App\Models\User;

class TaskCreateFormFields
{
    public function compose(View $view)
    {
        $emptyField = ['' => '----------'];
        $taskStatuses = $emptyField + TaskStatus::pluck('name', 'id')->toArray();
        $users = $emptyField + User::pluck('name', 'id')->toArray();
        $labels = Label::pluck('name', 'id')->toArray();

        $view->with('taskStatuses', $taskStatuses);
        $view->with('users', $users);
        $view->with('labels', $labels);
    }
}
