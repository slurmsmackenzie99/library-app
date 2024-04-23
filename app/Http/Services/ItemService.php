<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Comic;
use App\Models\ShortStoryCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ItemService
{
    public function getAllItems(): Collection
    {
        return collect([
            Book::all(),
            Comic::all(),
            ShortStoryCollection::all(),
        ])->flatten();
    }

    public function getItemDescription(int $id): ?string
    {
        $item = $this->getItemById($id);
        if (!$item) {
            return null;
        }

        $author = $item->author()->first();
        return "Price: {$item->price}, Title: {$item->title}, ..., Author: {$author->fullName()}, Place of Birth: {$author->place_of_birth}";
    }

    public function createItem(array $data): Model
    {
        $itemType = $data['type'];

        switch ($itemType) {
            case 'Book':
                return Book::create($data);
            case 'Comic':
                return Comic::create($data);
            case 'ShortStoryCollection':
                return ShortStoryCollection::create($data);
            default:
                throw new \InvalidArgumentException("Invalid item type: $itemType");
        }
    }

    public function updateItem(int $id, array $data): ?Model
    {
        $itemType = $this->getItemById($id);
        if (!$itemType) {
            return null;
        }

        $itemType->update($data);
        return $itemType;
    }

    public function deleteItem(int $id): void
    {
        $this->getItemById($id)->delete();
    }

    private function getItemById(int $id): ?Model
    {
        return collect([
            Book::find($id),
            Comic::find($id),
            ShortStoryCollection::find($id),
        ])->filter()->first();
    }
}
