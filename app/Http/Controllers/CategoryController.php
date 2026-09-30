<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('activities')->latest()->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
