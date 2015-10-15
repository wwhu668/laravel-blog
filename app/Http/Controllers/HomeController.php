<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tag;
use App\User;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->latest('published_at')->published()->paginate(10);
        $setups = json_decode(file_get_contents('setups.txt'));
        return view('home', compact('articles', 'setups'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $article = Article::findOrFail($id);
        $prev_article = Article::find(Article::getPrevArticleId($id));
        $next_article = Article::find(Article::getNextArticleId($id));
        $count_comment = Comment::where('article_id', '=', $id)->count();
        $comments = Comment::where('parent_id', '=', 0)->where('article_id', '=', $id)->with('childrenComments')->get();
        return view('home.show', compact('article', 'prev_article', 'next_article', 'count_comment', 'comments'));
    }

    public function search(Request $request)
    {
        $name = $request->input('search');
        $type = 'Search Results for';
        $articles = Article::search($name)->latest('published_at')->paginate(10);
        return view('home.type', compact('type', 'name', 'articles'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;
        $type = '类别';
        $articles = $category->articles()->latest('published_at')->paginate(10);
        return view('home.type', compact('type', 'name', 'articles'));
    }

    public function tag($id)
    {
        $tag = Tag::findOrFail($id);
        $name = $tag->name;
        $type = '标签';
        $articles = $tag->articles()->latest('published_at')->paginate(10);
        return view('home.type', compact('type', 'name', 'articles'));
    }

    public function author($id)
    {
        $author = User::findOrfail($id);
        $name = $author->name;
        $type = '作者';
        $articles = $author->articles()->latest('published_at')->paginate(10);
        return view('home.type', compact('type', 'name', 'articles'));
    }

}
