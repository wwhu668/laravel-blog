<?php

namespace App\Http\Controllers;

use App\Article;
// use Illuminate\Http\Request;
use Request;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index() {
        // $articles = Article::latest('published_at')->get();
        // $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();
        

        return view('articles.index', compact('articles'));
    }

    // public function show($iid) {
    public function show(Article $article) {
        dd($article);
        // dd($iid);
        // $article = Article::findOrFail($id);

        // dd($article->published_at->addDays(8));
        return view('articles.show', withArticle('article'));
    }

    public function create() {
        $tags = \App\Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request) {
        $article = Article::create(Request::all());
        $article->tags()->attach($request->input('tags'));
        \Session::flash('flash_message', '发布成功');
        \Session::flash('flash_message_important', true);
        return redirect('articles');
    }

    public function edit(Article $article){
        // $article = Article::findOrFail($id);
        $tags = \App\Tag::lists('name', 'id');
        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
        $article->update(Request::all());
        return redirect('articles');
    }
}
