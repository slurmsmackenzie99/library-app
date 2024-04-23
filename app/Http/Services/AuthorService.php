<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Support\Collection;

class AuthorService
{
    public function getAllAuthors(): Collection
    {
        return Author::all();
    }

    public function createAuthor(array $data): Author
    {
        return Author::create($data);
    }

    public function getAuthorById(int $id): ?Author
    {
        return Author::find($id);
    }

    public function updateAuthor(int $id, array $data): ?Author
    {
        $author = Author::find($id);
        if (!$author) {
            return null;
        }
        
        $author->update($data);
        return $author;
    }

    public function deleteAuthor(int $id): void
    {
        Author::destroy($id);
    }
}
