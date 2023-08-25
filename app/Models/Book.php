<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'describtion',
        'author_id',
    ];

    public function borrowedBooks(){

    return $this->hasMany(BorrowedBook::class);
    }

    public function categories(){

    return $this->hasMany(Category::class, "book_category", "book_id", "category_id");
    }

    public function author(){

    return $this->belongsTo(Author::class);
    }
}
