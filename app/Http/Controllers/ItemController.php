<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    // GET /api/items
    public function index(): JsonResponse
    {
        $items = $this->itemService->getAllItems();

        return response()->json($items);
    }

    // GET /api/items/{id}/description
    public function description(int $id): JsonResponse
    {
        $description = $this->itemService->getItemDescription($id);

        return response()->json($description);
    }

    // POST /api/items
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'type' => 'required|string',
        ]);

        $item = $this->itemService->createItem($request->all());

        return response()->json($item, 201);
    }

    // PUT /api/items/{id}
    public function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'type' => 'string',
        ]);

        $item = $this->itemService->updateItem($id, $request->all());

        return response()->json($item);
    }

    // DELETE /api/items/{id}
    public function destroy(int $id): JsonResponse
    {
        $this->itemService->deleteItem($id);

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
