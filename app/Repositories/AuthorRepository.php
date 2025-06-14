<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    protected $model;

    public function __construct(Author $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $author = $this->find($id);
        $author->update($data);
        return $author;
    }

    public function delete(int $id)
    {
        $author = $this->find($id);
        return $author->delete();
    }
}
