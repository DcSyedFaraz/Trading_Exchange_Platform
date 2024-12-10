<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     return view('admin.category');
    // }
    public function index()
    {
        // Eager load parent category information if needed
        $categories = Category::with('parent')->orderBy('name')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        // Get a list of categories to choose a parent from
        // Only top-level or all categories can be parents
        $allCategories = Category::orderBy('name')->get();
        return view('admin.categories.create', compact('allCategories'));
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug'],
            'parent_id' => ['nullable', 'exists:categories,id']
        ]);

        // If slug is not provided, generate one
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            // Ensure uniqueness:
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Category::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    // Display a single category
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // Show form to edit an existing category
    public function edit(Category $category)
    {
        $allCategories = Category::where('id', '!=', $category->id)->orderBy('name')->get();
        return view('admin.categories.edit', compact('category', 'allCategories'));
    }

    // Update an existing category in the database
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($category->id)
            ],
            'parent_id' => ['nullable', 'exists:categories,id']
        ]);

        // If slug is empty, regenerate
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            // Ensure uniqueness if changed
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Category::where('slug', $validated['slug'])->where('id', '!=', $category->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete an existing category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
