<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Mostra 10 articoli (pubblica, route /articles)
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(10)->get();
        return view('articles.index', compact('articles'));
    }

    // LISTA COMPLETA IN AREA ADMIN
    public function adminIndex()
    {
        // Tutti gli articoli, paginati
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles.adminIndex', compact('articles'));
    }

    // Mostra il modulo di creazione articolo
    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    // Salva il nuovo articolo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        $article = Article::create([
            'title'   => $request->input('title'),
            'body'    => $request->input('body'),
            'user_id' => Auth::id(),
        ]);

        // Selezione dei tag (supponendo di avere un campo 'tags' dal form)
        if ($request->has('tags')) {
            $article->tags()->attach($request->input('tags'));
        }

        return redirect()->route('articles.admin.index')->with('message', 'Articolo creato con successo!');
    }

    // Visualizza un singolo articolo (pubblico)
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Mostra il modulo di modifica per un articolo
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
    }

    // Aggiorna l'articolo
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);

        $article->update([
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
        ]);

        // Sincronizza i tag se presenti
        $article->tags()->sync($request->input('tags', []));

        return redirect()->route('articles.admin.index')->with('message', 'Articolo aggiornato con successo!');
    }

    // Elimina un articolo
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.admin.index')->with('message', 'Articolo eliminato!');
    }
}
