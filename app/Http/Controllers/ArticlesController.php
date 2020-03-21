<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;

use Illuminate\Http\Request;


class ArticlesController extends Controller
{
    public function show( Article $article ){

        return view('articles.show', [ 'article' => $article ]);
    }

    public function index(){

        if (request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }else{
            $articles = Article::latest()->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function create(){
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(){

        $validatedAttributes =$this->validateArticle();

        $article = new Article(request(['title', 'body', 'excerpt']));
        $article->user_id = 1 ;
        $article->save();
        $article->tags()->attach(request('tags'));

        return redirect('/articles');

    }

    public function edit( Article $article ){

        return view('articles.edit', ['article'=> $article]);
    }

    public function update( Article $article ){

        $validatedAttributes = $this->validateArticle() ;
        $article->update($validatedAttributes);
        return redirect('/articles/'. $article->id );
    }

    public function validateArticle(){
        return request()->validate([
            'tags' => 'exists:tags,id',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
