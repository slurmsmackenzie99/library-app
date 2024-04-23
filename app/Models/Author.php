<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'place_of_birth'];

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
