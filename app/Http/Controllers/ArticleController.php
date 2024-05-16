<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());

        // Qui ci assicuriamo che il file esista e sia stato caricato correttamente
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $extension = $request->file('image')->extension();

            $fileName = 'image.' . $extension;

            $fileName = $request->file('image')->getClientOriginalName();

            $fileName = uniqid('image_') . '.' . $extension;

            // storeAs restituisce il percorso relativo, a partire da storage/app, del file salvato su disco
            $article->image = $request->file('image')->storeAs('public/images/' . $article->id, $fileName);

            $article->save();

        }

        return redirect()->route('articles.index')->with(['success' => 'Articolo creato correttamente!']);
    }
}