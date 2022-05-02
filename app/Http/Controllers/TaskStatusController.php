<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
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
     * @param \App\Http\Requests\TaskStatusRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStatusRequest $request)
    {
        $created = TaskStatus::create($request->validated());

        if (!$created) {
            return back()->withErrors(['msg' => __('Fail. Status not created.')])->withInput();
        }

        return redirect()->route('task_statuses.index')->with(['success' => __('Status added.')]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TaskStatus $taskStatus)
    {
        //
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
     * @param \App\Http\Requests\TaskStatusRequest $request
     * @param \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function update(TaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $updated = $taskStatus->update($request->validated());

        if (!$updated) {
            return back()->withErrors(['msg' => __('Failed to update status.')])->withInput();
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
            return redirect()->route('task_statuses.index')->withErrors(['msg' => __('Failed to delete status.')]);
        }
        $taskStatus->delete();
        return redirect()->route('task_statuses.index')->with(['success' => __('Status deleted.')]);
    }
}
