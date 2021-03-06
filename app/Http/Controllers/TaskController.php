<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @phpstan-ignore-next-line */
        $tasks = QueryBuilder::for(Task::class)
            ->latest()
            ->with('creator', 'assigned', 'status', 'labels')
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id')
            ])
            ->paginate()->withQueryString();


        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        return view('task.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        DB::transaction(function () use ($request): Task {
            $task = $request->user()->createdTasks()->create($request->only(['name', 'description', 'status_id', 'assigned_to_id']));
            $task->labels()->sync($request->labels);
            return $task;
        });

        return redirect()->route('tasks.index')->with(['success' => __('Task added.')]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTaskRequest $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $updated = DB::transaction(function () use ($request, $task): Task {
            $task->fill($request->only(['name', 'description', 'status_id', 'assigned_to_id']));
            $task->save();
            $task->labels()->sync($request->labels);
            return $task;
        });

        if ($updated->notExists) {
            return back()->withErrors(['error' => __('Failed to update task.')])->withInput();
        }

        return redirect()->route('tasks.index')->with(['success' => __('Task updated.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with(['success' => __('Task deleted.')]);
    }
}
