<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Tag;
use App\Category;
use Feed;
use URL;
use Cache;

class ArticleController extends Controller
{
    /**
     * index 
     * 
     * @access public
     * @return void
     */
    public function index() 
    {
        $articles = Article::with('user')->latest('published_at')->published()->paginate(15);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * create 
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        $tags = Tag::lists('name','id');
        $categorys = Category::lists('name', 'id');
        // dd($categorys);
        return view('admin.article.create', compact('tags', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {


        $tag_list = $request->input('tag_list');
        $this->TagList($tag_list);
        $article = new Article($request->all());
        \Auth::user()->articles()->save($article);
        $article->tags()->attach($tag_list);
        return redirect('admin/article'); 
    }


    /**
     * show 
     * 
     * @param mixed $id 
     * @access public
     * @return void
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.show', compact('article'));
    }

    /**
     * edit 
     * 
     * @param mixed $id 
     * @access public
     * @return void
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
        $categorys = Category::lists('name', 'id');
        return view('admin.article.edit', compact('article', 'tags', 'categorys')); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {

        $tag_list = $request->input('tag_list');
        $this->TagList($tag_list);
        $article = Article::findOrFail($id);
        $article->update($request->all());
        $article->tags()->sync($tag_list);
        return redirect('admin/article');
    }

    /**
     * TagList 
     * 
     * @param array $tag_list 
     * @access protected
     * @return void
     */
    protected function TagList(array &$tag_list)
    {
        foreach ($tag_list as $key => $name) {
            $tag = Tag::find(['id' => $name])->toArray();
            if (!$tag) {
                $tag_id = Tag::create(['name' => $name]);
                $tag_list[$key] = $tag_id['id'];
            }
        }
    }

    /**
     * destroy 
     * 
     * @param mixed $id 
     * @access public
     * @return void
     */
    public function destroy($id)
    {
        $return = Article::find($id)->delete();
        if ($return) {
            \App\Comment::where('article_id', '=', $id)->delete();
        }
        return redirect('admin/article');
    }


    /**
     * feed rss 生成
     * 
     * @access public
     * @return void
     */
    public function feed()
    {

        // create new feed
        $feed = Feed::make();

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 articles
            $articles = Article::orderBy('created_at', 'deac')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = 'WWHBlog';
            $feed->description = '基于 laravel 5 开发的个人博客';
            $feed->link = URL::to('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $articles[0]->created_at;
            $feed->lang = 'zh-cn';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text
            foreach ($articles as $article)
            {
                // set item's title, author, url, pubdate, description and content
                $feed->add($article->title, $article->user->name, URL::route('home.show', $article->id), $article->created_at, $article->intro, $article->body);
            }

        }
        $feed->ctype = 'application/xml';
        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // return $feed->render('atom', -1);

    }

    /**
     * sitemap 网站地图
     * 
     * @access public
     * @return void
     */
    public function sitemap()
    {
        // create new sitemap object
        $sitemap = \App::make("sitemap");
        // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 3600);

        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached())
        { 
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
            // $sitemap->add(URL::to('article'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

            // get all articles from db
            $articles = \DB::table('articles')->orderBy('created_at', 'desc')->get();

            // add every post to the sitemap
            foreach ($articles as $article)
            {
                $sitemap->add('home/'.$article->id, $article->updated_at, 0.9, 'weekly', null, $article->title);
            }
        }

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }

}
