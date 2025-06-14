<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'authors' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'google_books_id' => 'nullable|string|unique:books',
            'publisher' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'isbn' => 'nullable|string|max:20',
            'page_count' => 'nullable|integer|min:1',
            'thumbnail' => 'nullable|url',
        ];
    }
}
