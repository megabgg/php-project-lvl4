<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::paginate();

        return view('label.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $label = new Label();

        return view('label.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreLabelRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabelRequest $request)
    {
        $created = Label::create($request->validated())->exists ?? false;

        if (!$created) {
            return back()->withErrors(['error' => __('Fail. Label not created.')])->withInput();
        }

        return redirect()->route('labels.index')->with(['success' => __('Label added.')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Label $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        return view('label.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateLabelRequest $request
     * @param \App\Models\Label $label
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        $updated = $label->update($request->validated());

        if (!$updated) {
            return back()->withErrors(['error' => __('Failed to update label.')])->withInput();
        }

        return redirect()->route('labels.index')->with(['success' => __('Label updated.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Label $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        if ($label->task()->exists()) {
            return redirect()->route('labels.index')->withErrors(['error' => __('Failed to delete label.')]);
        }

        $label->delete();
        return redirect()->route('labels.index')->with(['success' => __('Label deleted.')]);
    }
}
