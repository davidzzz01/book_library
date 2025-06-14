<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\UseCases\Category\CategoryUseCase;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(private CategoryUseCase $categoryUseCase) {}

    public function index(): JsonResponse
    {
        $categories = $this->categoryUseCase->getAll();
        return response()->json($categories);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->categoryUseCase->create($request->validated());
        return response()->json($category, 201);
    }

    public function show(int $id): JsonResponse
    {
        $category = $this->categoryUseCase->getById($id);
        return response()->json($category);
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $category = $this->categoryUseCase->update($id, $request->validated());
        return response()->json($category);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->categoryUseCase->delete($id);
        return response()->json(null, 204);
    }
}
