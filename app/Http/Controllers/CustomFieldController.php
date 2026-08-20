<?php

namespace App\Http\Controllers;

use App\Models\CustomField;
use App\Models\RecordCategory;
use Illuminate\Http\Request;

class CustomFieldController extends Controller
{
    public function index(RecordCategory $recordCategory)
    {
        $fields = $recordCategory->customFields;

        return view('custom-fields.index', compact(
            'recordCategory',
            'fields'
        ));
    }

    public function create(RecordCategory $recordCategory)
    {
        return view('custom-fields.create', compact(
            'recordCategory'
        ));
    }

    public function store(
        Request $request,
        RecordCategory $recordCategory
    ) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'field_type' => [
                'required',
                'in:text,textarea,date,number,select,checkbox',
            ],
            'is_required' => ['nullable', 'boolean'],
        ]);

        $validated['record_category_id'] = $recordCategory->id;
        $validated['is_required'] = $request->boolean('is_required');
        $validated['is_active'] = true;

        $validated['sort_order'] =
            $recordCategory->customFields()->count() + 1;

        CustomField::create($validated);

        return redirect()
            ->route(
                'record-categories.custom-fields.index',
                $recordCategory
            )
            ->with('success', 'Custom field created successfully.');
    }

    public function edit(
        RecordCategory $recordCategory,
        CustomField $customField
    ) {
        return view('custom-fields.edit', compact(
            'recordCategory',
            'customField'
        ));
    }

    public function update(
        Request $request,
        RecordCategory $recordCategory,
        CustomField $customField
    ) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'field_type' => [
                'required',
                'in:text,textarea,date,number,select,checkbox',
            ],
            'is_required' => ['nullable', 'boolean'],
        ]);

        $validated['is_required'] =
            $request->boolean('is_required');

        $customField->update($validated);

        return redirect()
            ->route(
                'record-categories.custom-fields.index',
                $recordCategory
            )
            ->with('success', 'Custom field updated successfully.');
    }

    public function destroy(
        RecordCategory $recordCategory,
        CustomField $customField
    ) {
        $customField->delete();

        return redirect()
            ->route(
                'record-categories.custom-fields.index',
                $recordCategory
            )
            ->with('success', 'Custom field deleted successfully.');
    }
}