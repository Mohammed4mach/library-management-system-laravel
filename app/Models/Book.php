<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function BorrowedBook(){

    return $this->hasMany(BorrowedBook::class);
    }

    public function Category(){

    return $this->hasMany(Category::class);
    }

    public function Author(){

    return $this->belongsTo(Author::class);
    }
}
