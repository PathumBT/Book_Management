<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCate extends Model
{
    use HasFactory;
    protected $table = 'book_cate';

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
