@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <h1>Add Field</h1>

        <p>
            Add a field to {{ $recordCategory->name }}.
        </p>
    </div>

</div>

<div class="card">

    @if ($errors->any())

        <div class="error">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form
        action="{{ route(
            'record-categories.custom-fields.store',
            $recordCategory
        ) }}"
        method="POST"
    >

        @csrf

        <div class="form-group">

            <label for="name">
                Field Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Example: Date of Birth"
                required
            >

        </div>

        <div class="form-group">

            <label for="field_type">
                Field Type
            </label>

            <select
                id="field_type"
                name="field_type"
                class="form-control"
                required
            >

                <option value="text">
                    Text
                </option>

                <option value="textarea">
                    Long Text
                </option>

                <option value="date">
                    Date
                </option>

                <option value="number">
                    Number
                </option>

                <option value="select">
                    Dropdown
                </option>

                <option value="checkbox">
                    Checkbox
                </option>

            </select>

        </div>

        <div class="form-group">

            <label>

                <input
                    type="checkbox"
                    name="is_required"
                    value="1"
                >

                Required field

            </label>

        </div>

        <button
            type="submit"
            class="button"
        >
            Save Field
        </button>

        <a
            href="{{ route(
                'record-categories.custom-fields.index',
                $recordCategory
            ) }}"
            class="button button-secondary"
        >
            Cancel
        </a>

    </form>

</div>

@endsection