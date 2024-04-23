<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'price' => 'required|numeric',
            'author_id' => 'required|exists:authors,id',
            'type' => 'required|string|in:Book,Comic,ShortStoryCollection',
        ];
    }
}
