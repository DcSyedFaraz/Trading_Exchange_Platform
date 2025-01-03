@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label>Slug (optional, will be generated if left empty)</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
            </div>

            <div class="mb-3">
                <label>Parent Category (optional)</label>
                <select name="parent_id" class="form-control">
                    <option value="">None</option>
                    @foreach ($allCategories as $c)
                        <option value="{{ $c->id }}" {{ old('parent_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success" type="submit">Create</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
