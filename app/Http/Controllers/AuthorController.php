<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    // GET /api/authors
    public function index(): JsonResponse
    {
        $authors = $this->authorService->getAllAuthors();

        return response()->json($authors);
    }

    // POST /api/authors
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'place_of_birth' => 'required|string',
        ]);

        $author = $this->authorService->createAuthor($request->only(['first_name', 'last_name', 'place_of_birth']));

        return response()->json($author, 201);
    }

    // GET /api/authors/{id}
    public function show(int $id): JsonResponse
    {
        $author = $this->authorService->getAuthorById($id);

        return response()->json($author);
    }

    // PUT /api/authors/{id}
    public function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'first_name' => 'string',
            'last_name' => 'string',
            'place_of_birth' => 'string',
        ]);

        $author = $this->authorService->updateAuthor($id, $request->only(['first_name', 'last_name', 'place_of_birth']));

        return response()->json($author);
    }

    // DELETE /api/authors/{id}
    public function destroy(int $id): JsonResponse
    {
        $this->authorService->deleteAuthor($id);

        return response()->json(['message' => 'Author deleted successfully']);
    }
}
