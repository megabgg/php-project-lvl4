<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskStatuses = TaskStatus::paginate();

        return view('task_status.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taskStatus = new TaskStatus();

        return view('task_status.create', compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTaskStatusRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskStatusRequest $request)
    {
        $created = TaskStatus::create($request->validated());

        if ($created->notExists) {
            return back()->withErrors(['error' => __('Fail. Status not created.')])->withInput();
        }

        return redirect()->route('task_statuses.index')->with(['success' => __('Status added.')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTaskStatusRequest $request
     * @param \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $updated = $taskStatus->update($request->validated());

        if (!$updated) {
            return back()->withErrors(['error' => __('Failed to update status.')])->withInput();
        }

        return redirect()->route('task_statuses.index')->with(['success' => __('Status updated.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->task()->exists()) {
            return redirect()->route('task_statuses.index')->withErrors(['error' => __('Failed to delete status.')]);
        }
        $taskStatus->delete();
        return redirect()->route('task_statuses.index')->with(['success' => __('Status deleted.')]);
    }
}
