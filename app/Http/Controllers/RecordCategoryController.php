<?php

namespace App\Http\Controllers;

use App\Models\RecordCategory;
use Illuminate\Http\Request;

class RecordCategoryController extends Controller
{
    public function index()
    {
        $categories = RecordCategory::latest()->get();

        return view('record-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('record-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:record_categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        RecordCategory::create($validated);

        return redirect()
            ->route('record-categories.index')
            ->with('success', 'Record category created successfully.');
    }

    public function edit(RecordCategory $recordCategory)
    {
        return view('record-categories.edit', compact('recordCategory'));
    }

    public function update(Request $request, RecordCategory $recordCategory)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:record_categories,name,' . $recordCategory->id,
            ],
            'description' => ['nullable', 'string'],
        ]);

        $recordCategory->update($validated);

        return redirect()
            ->route('record-categories.index')
            ->with('success', 'Record category updated successfully.');
    }

    public function destroy(RecordCategory $recordCategory)
    {
        $recordCategory->delete();

        return redirect()
            ->route('record-categories.index')
            ->with('success', 'Record category deleted successfully.');
    }
}