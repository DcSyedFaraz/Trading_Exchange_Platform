@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h1>Edit Category: {{ $category->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="mb-3">
                <label>Slug (optional)</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}">
                <small>Leave empty to regenerate from name.</small>
            </div>

            <div class="mb-3">
                <label>Parent Category</label>
                <select name="parent_id" class="form-control">
                    <option value="">None</option>
                    @foreach ($allCategories as $c)
                        <option value="{{ $c->id }}"
                            {{ old('parent_id', $category->parent_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-warning" type="submit">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
