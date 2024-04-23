<?php 

namespace App\Repositories;

use App\Models\Book;
use App\Models\Comic;
use App\Models\ShortStoryCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ItemRepository
{
    public function getAllItems(): Collection
    {
        return collect([
            Book::all(),
            Comic::all(),
            ShortStoryCollection::all(),
        ])->flatten();
    }

    public function getById(int $id): ?Model
    {
        return collect([
            Book::find($id),
            Comic::find($id),
            ShortStoryCollection::find($id),
        ])->filter()->first();
    }

    public function create(array $data): Model
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
                // Handle unsupported item type
                throw new \InvalidArgumentException("Invalid item type: $itemType");
        }
    }

    public function update(int $id, array $data): ?Model
    {
        $item = $this->getById($id);
        if (!$item) {
            return null;
        }

        $item->update($data);
        return $item;
    }

    public function delete(int $id): void
    {
        $this->getById($id)->delete();
    }
}
