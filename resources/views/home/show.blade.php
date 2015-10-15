@extends('default', ['title' => $article->title, 'keywords' => $article->intro, 'description' => $article->excerpt])

@section('content')
@include('home.article')




<div id="comments" class="comments-area"> 
@include('errors.form')
    <h2 class="comments-title">{{ $count_comment }} thoughts on “{{ $article->title }}”</h2> 

    <ol class="comment-list"> 
    <?php 
    function commentsOrder($comments,$id)
    {
        foreach ($comments as $comment) { 
    ?>

        <li id="comment-{{ $comment->id }}" class="comment even thread-even depth-1"> 
        <article id="div-comment-{{ $comment->id }}" class="comment-body"> 
            <footer class="comment-meta"> 
                <div class="comment-author vcard"> 
                    <img alt="" src="{{ asset('fhome/default.png') }}" srcset="" class="avatar avatar-56 photo avatar-default" height="56" width="56" /> 
                    <b class="fn"><a href="" rel="external nofollow" class="url">{{ $comment->username }}</a></b>
                    <span class="says">说道：</span> 
                </div>
                <!-- .comment-author --> 
                <div class="comment-metadata"> 
                <a href=""> <time datetime="{{ $comment->created_at }}">{{ $comment->created_at }}</time> </a> 
                </div>
                <!-- .comment-metadata --> 
            </footer>
            <!-- .comment-meta --> 
            <div class="comment-content"> 
            {!! EndaEditor::MarkDecode($comment->content) !!}
            </div>
            <!-- .comment-content --> 
            <div class="reply">
                <a rel="nofollow" class="comment-reply-link" href="" onclick="return addComment.moveForm( &quot;div-comment-{{ $comment->id }}&quot;, &quot;{{ $comment->id }}&quot;, &quot;respond&quot;, &quot;{{ $id }}&quot; )" aria-label="回复给WordPress先生">回复</a>
            </div> 
        </article>
        <!-- .comment-body --> 

    <?php
            if ($comment->childrenComments->toArray()) {
                echo '<ol class="children">';
                commentsOrder($comment->childrenComments,$id);
                echo '</ol>';
            } else {
                echo '</li>';
            }
        }
    }
    commentsOrder($comments,$article->id);
    ?>
    </ol>

 <div id="respond" class="comment-respond"> 
   <h3 id="reply-title" class="comment-reply-title">发表评论 <small><a rel="nofollow" id="cancel-comment-reply-link" href="http://localhost/index.php/2015/09/23/hello-world/#respond" style="display: none;">取消回复</a></small></h3> 
   <form action="{{ Route('comment.store') }}" method="post" id="commentform" class="comment-form" novalidate=""> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p class="comment-notes"><span id="email-notes">电子邮件地址不会被公开。</span> 必填项已用<span class="required">*</span>标注</p> 
    <p class="comment-form-author"><label for="author">姓名 <span class="required">*</span></label> <input id="author" name="username" type="text" value="" size="30" aria-required="true" required="required" /></p> 
    <p class="comment-form-email"><label for="email">电子邮件 <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" aria-describedby="email-notes" aria-required="true" required="required" /></p> 
    <p class="comment-form-url"><label for="url">站点</label> <input id="url" name="url" type="url" value="" size="30" /></p> 
    <p class="comment-form-comment"><label for="comment">评论</label> 
        <textarea id="comment" name="content" cols="45" rows="8" aria-required="true" required="required"></textarea>
    </p> 
    <p class="form-submit">
        <input name="submit" type="submit" id="submit" class="submit" value="发表评论" /> 
        <input type="hidden" name="article_id" value="{{ $article->id }}" id="comment_post_ID" /> 
        <input type="hidden" name="parent_id" id="comment_parent" value="0" /> 
    </p> 
   </form> 
  </div>  
</div>

 <nav class="navigation post-navigation" role="navigation"> 
   <h2 class="screen-reader-text">文章导航</h2> 
   <div class="nav-links">
    <div class="nav-previous">
      <a href="{{ Route('home.show', $prev_article['id']) }}" rel="prev">
      <span class="meta-nav" aria-hidden="true">Previous</span> 
      <span class="screen-reader-text">Previous Article:</span> 
      <span class="post-title">{{ $prev_article['title'] }}</span>
      </a>
    </div>
@if ($next_article['id'])
    <div class="nav-next">
     <a href="{{ Route('home.show', $next_article['id']) }}" rel="next">
        <span class="meta-nav" aria-hidden="true">Next</span>
        <span class="screen-reader-text">Next Article:</span> 
        <span class="post-title">{{ $next_article['title'] }}</span></a>
    </div>
@endif
   </div> 
  </nav>

@stop
