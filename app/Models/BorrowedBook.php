<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;

    public function user(){

    return $this->hasMany(User::class);
    }

    public function Book(){

    return $this->hasMany(Book::class);
    }
}
