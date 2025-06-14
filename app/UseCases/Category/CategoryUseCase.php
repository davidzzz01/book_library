<?php

namespace App\UseCases\Category;

use App\Repositories\CategoryRepository;

class CategoryUseCase
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {}

    
    public function getAll()
    {
        return $this->categoryRepository->all();
    }

    
    public function getById(int $id)
    {
        return $this->categoryRepository->find($id);
    }


    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    
    public function update(int $id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    
    public function delete(int $id)
    {
        return $this->categoryRepository->delete($id);
    }
}
