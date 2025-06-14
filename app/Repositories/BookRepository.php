<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }



    public function all()
    {
        return $this->model->with(['category', 'author'])->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findByGoogleId(string $googleId)
    {
        return $this->model->where('google_books_id', $googleId)->first();
    }

    public function findByCategory(int $categoryId)
    {
        return $this->model->where('category_id', $categoryId)->get();
    }

    public function filterByAuthor(int $authorId)
    {
        return $this->model->with(['category', 'author'])
            ->where('author_id', $authorId)
            ->get();
    }
}
