<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AuthorRepository
{
    public function getAllAuthors(): Collection
    {
        return Author::all();
    }

    public function create(array $data): Author
    {
        return Author::create($data);
    }

    public function getById(int $id): ?Author
    {
        return Author::find($id);
    }

    public function update(int $id, array $data): ?Author
    {
        $author = Author::find($id);
        if (!$author) {
            return null;
        }

        $author->update($data);
        return $author;
    }

    public function delete(int $id): void
    {
        Author::destroy($id);
    }
}
