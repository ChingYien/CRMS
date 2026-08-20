@extends('layouts.app')

@section('content')

<div class="page-header">
    <div>
        <h1>Record Categories</h1>
        <p>Manage the types of records stored in CRMS.</p>
    </div>

    <a href="{{ route('record-categories.create') }}" class="button">
        + Add Category
    </a>
</div>

<div class="card">

    @if ($categories->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($categories as $category)

                    <tr>
                        <td>
                            <strong>{{ $category->name }}</strong>
                        </td>

                        <td>
                            {{ $category->description ?? '-' }}
                        </td>

                        <td>
                            @if ($category->is_active)
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
                            {{ $category->created_at->format('d/m/Y') }}
                        </td>

                        <td>

                            <a
                                href="{{ route('record-categories.edit', $category) }}"
                                class="button"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('record-categories.destroy', $category) }}"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Are you sure you want to delete this category?');"
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

        <p>No record categories have been created yet.</p>

    @endif

</div>

@endsection