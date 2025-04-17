<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    // Relazione One-to-Many inversa: ogni articolo appartiene ad un utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relazione Many-to-Many con Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
