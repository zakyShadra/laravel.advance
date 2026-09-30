<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Validation\ValidationException;

class CategoryService
{
    public function delete(Category $category): void
    {
        if ($category->activities()->exists()) {
            throw ValidationException::withMessages([
                'category' => 'Kategori tidak dapat dihapus karena masih digunakan oleh kegiatan.',
            ]);
        }

        $category->delete();
    }
}
