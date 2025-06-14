<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'authors' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'sometimes|exists:categories,id',
            'google_books_id' => 'sometimes|string|unique:books,google_books_id,'.$this->book,
            'publisher' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'isbn' => 'nullable|string|max:20',
            'page_count' => 'nullable|integer|min:1',
            'thumbnail' => 'nullable|url',
        ];
    }
}
