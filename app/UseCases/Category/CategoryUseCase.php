<?php

namespace App\UseCases\Category;

use App\Repositories\CategoryRepository;

class CategoryUseCase
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {}

    // Listar todas categorias
    public function getAll()
    {
        return $this->categoryRepository->all();
    }

    // Buscar categoria por ID
    public function getById(int $id)
    {
        return $this->categoryRepository->find($id);
    }

    // Criar nova categoria
    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    // Atualizar categoria
    public function update(int $id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    // Deletar categoria
    public function delete(int $id)
    {
        return $this->categoryRepository->delete($id);
    }
}
