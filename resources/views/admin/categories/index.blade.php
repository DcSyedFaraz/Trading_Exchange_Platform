@extends('admin.layout.master')
@section('content')
    <div class="adssec">
        <div class="container">
            <h2 class="sub-head">Categories Update</h2>
            <a href="{{ route('categories.create') }}" class="addprod">
                Categories Add
            </a>
            <div class="row align-items-center">
                <div class="table">
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                <tr>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->slug }}</td>
                                    <td>{{ $cat->parent ? $cat->parent->name : 'None' }}</td>
                                    <td>
                                        <a href="{{ route('categories.show', $cat->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('categories.edit', $cat->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
