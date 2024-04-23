<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'author_id', 'genre'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
