<?php

namespace App\Http\Controllers;

use App\Models\Article; // Se necessario
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $articles = Article::orderBy('created_at', 'desc')
                           ->take(10)
                           ->get();
        return view('home', compact('articles'));
    }
}
