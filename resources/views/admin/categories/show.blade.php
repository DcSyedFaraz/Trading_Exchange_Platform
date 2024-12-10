@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h1>{{ $category->name }} Category</h1>
        <p><strong>Slug:</strong> {{ $category->slug }}</p>
        <p><strong>Parent:</strong> {{ $category->parent ? $category->parent->name : 'None' }}</p>

        @if ($category->children->count())
            <h3>Subcategories:</h3>
            <ul>
                @foreach ($category->children as $child)
                    <li>{{ $child->name }} (slug: {{ $child->slug }})</li>
                @endforeach
            </ul>
        @else
            <p>No subcategories.</p>
        @endif

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </div>
@endsection
