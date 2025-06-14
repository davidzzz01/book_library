<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'birth_date',
        'nationality'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_book');
    }

}
