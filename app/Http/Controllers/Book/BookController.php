<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\UseCases\Book\BookUseCase;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function __construct(private BookUseCase $bookUseCase) {}

    public function index(): JsonResponse
    {
        $books = $this->bookUseCase->getAll();
        return response()->json($books);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = $this->bookUseCase->create($request->validated());
        return response()->json($book, 201);
    }

    public function show(int $id): JsonResponse
    {
        $book = $this->bookUseCase->getById($id);
        return response()->json($book);
    }

    public function update(UpdateBookRequest $request, int $id): JsonResponse
    {
        $book = $this->bookUseCase->update($id, $request->validated());
        return response()->json($book);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->bookUseCase->delete($id);
        return response()->json(null, 204);
    }
    public function filterByAuthor(Request $request, $authorId)
    {
        $books = $this->bookUseCase->filterByAuthor($authorId);
        return response()->json($books);
    }
}
