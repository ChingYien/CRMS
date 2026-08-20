@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Add Record Category</h1>
        <p>Create a new type of historical record.</p>
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
        action="{{ route('record-categories.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-group">
            <label for="name">Category Name</label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Example: Baptism"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                class="form-control"
                placeholder="Describe what this category is used for..."
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="button">
            Save Category
        </button>

        <a
            href="{{ route('record-categories.index') }}"
            class="button button-secondary"
        >
            Cancel
        </a>

    </form>

</div>

@endsection