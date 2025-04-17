<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relazione Many-to-Many: un tag può appartenere a più articoli
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
