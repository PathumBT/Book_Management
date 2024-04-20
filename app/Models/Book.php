<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'price', 'stock', 'book_category_id'];
    
    public function category()
    {
        return $this->belongsTo(BookCate::class, 'book_category_id');
    }

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('issued_at', 'returned_at');
    }

}
