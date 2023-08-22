<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function books(){

    return $this->hasMany(Book::class, "book_category", "category_id", "book_id");
    }
}
