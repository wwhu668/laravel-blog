
<article class="hentry">
	<header class="entry-header">
        <h2 class="entry-title"><a href="{{ Route('home.show', $article->id)}}" rel="bookmark">{{ $article->title }}</a></h2>	
    </header><!-- .entry-header -->

	<div class="entry-content">
    @if (empty($articles))
	{!! EndaEditor::MarkDecode($article->body) !!}
    @else 
	{!! str_limit(EndaEditor::MarkDecode($article->body), $limit = 200, $end = '...') !!}
    @endif
	</div><!-- .entry-content -->
	<footer class="entry-footer">
        <span class="posted-on">
            <span class="screen-reader-text">Posted on </span>
                <a href="" rel="bookmark">
                    <time class="entry-date published"> {{ $article->published_at->diffForHumans() }}</time>
                </a>
            </span>
            @if (Route::currentRouteName() === 'home.show')
            <span class="byline">
              <span class="author vcard">
                <span class="screen-reader-text">Author </span>
                <a href="{{ Route('home.author', $article->user_id) }}">{{ $article->user->name }}</a>
              </span>
            </span>
            @endif
            <span class="cat-links">
                <span class="screen-reader-text">Categories </span>
                <a href="{{ Route('home.category', $article->category_id) }}" rel="category">{{ $article->category->name }}</a>
            </span>
            @if (count($article->tags))
            <span class="tags-links">
                <span class="screen-reader-text">Tags </span>
                @foreach($article->tags as $tag)
                <a href="{{ Route('home.tag', $tag->id) }}" rel="tag">{{ $tag->name }}</a>
                @endforeach
            </span>
            @endif
            @if (Route::currentRouteName() !== 'home.show')
            <span class="comments-link">
            <a href="{{ Route('home.show', $article->id) }}">
                @if ($count = App\Comment::where('article_id', '=', $article->id)->count())
                有 {{ $count }} 条评论
                @else  
                Leave a comment
                @endif
            <span class="screen-reader-text"> on aa</span></a></span>			
            @endif
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

