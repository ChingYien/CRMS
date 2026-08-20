@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <h1>{{ $recordCategory->name }} Fields</h1>

        <p>
            Manage the fields used for
            {{ $recordCategory->name }} records.
        </p>
    </div>

    <a
        href="{{ route(
            'record-categories.custom-fields.create',
            $recordCategory
        ) }}"
        class="button"
    >
        + Add Field
    </a>

</div>

<div class="card">

    @if ($fields->count() > 0)

        <table>

            <thead>
                <tr>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Required</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($fields as $field)

                    <tr>

                        <td>
                            {{ $field->sort_order }}
                        </td>

                        <td>
                            <strong>
                                {{ $field->name }}
                            </strong>
                        </td>

                        <td>
                            {{ ucfirst($field->field_type) }}
                        </td>

                        <td>

                            @if ($field->is_required)
                                Yes
                            @else
                                No
                            @endif

                        </td>

                        <td>

                            @if ($field->is_active)

                                <span class="badge badge-active">
                                    Active
                                </span>

                            @else

                                <span class="badge badge-inactive">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route(
                                    'record-categories.custom-fields.edit',
                                    [$recordCategory, $field]
                                ) }}"
                                class="button"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route(
                                    'record-categories.custom-fields.destroy',
                                    [$recordCategory, $field]
                                ) }}"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Delete this field?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="button button-danger"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>
            No fields have been created for this category yet.
        </p>

    @endif

</div>

@endsection