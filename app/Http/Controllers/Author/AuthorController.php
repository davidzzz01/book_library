<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\UseCases\Author\AuthorUseCase;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    protected $authorUseCase;

    public function __construct(AuthorUseCase $authorUseCase)
    {
        $this->authorUseCase = $authorUseCase;
    }

    public function index(): JsonResponse
    {
        $authors = $this->authorUseCase->getAll();
        return response()->json($authors);
    }

    public function store(StoreAuthorRequest $request): JsonResponse
    {
        $author = $this->authorUseCase->create($request->validated());
        return response()->json($author, 201);
    }

    public function show(int $id): JsonResponse
    {
        $author = $this->authorUseCase->getById($id);
        return response()->json($author);
    }

    public function update(UpdateAuthorRequest $request, int $id): JsonResponse
    {
        $author = $this->authorUseCase->update($id, $request->validated());
        return response()->json($author);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->authorUseCase->delete($id);
        return response()->json(null, 204);
    }
}
