<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortStoryCollection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'author_id', 'theme'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
