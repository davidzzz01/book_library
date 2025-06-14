<?php

namespace App\UseCases\Book;

use App\Repositories\BookRepository;

class BookUseCase
{
    public function __construct(
        private BookRepository $bookRepository
    ) {}


    public function getAll()
    {
        return $this->bookRepository->all();
    }


    public function filterByAuthor(int $authorId)
    {
        return $this->bookRepository->filterByAuthor($authorId);
    }

    public function getById(int $id)
    {
        return $this->bookRepository->find($id);
    }


    public function create(array $data)
    {
        return $this->bookRepository->create($data);
    }


    public function update(int $id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->bookRepository->delete($id);
    }


    public function getByCategory(int $categoryId)
    {
        return $this->bookRepository->findByCategory($categoryId);
    }
}
