@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Article</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<table class="table table-hover">
    <tr>
        <th>标题</th>
        <th>作者</th>
        <th>分类</th>
        <th>标签</th>
        <th>评论</th>
        <th>日期</th>
        <th>操作</th>
    </tr>
@foreach($articles as $article)
    <tr>
        <td><a href="{{ Route('home.show', $article->id) }}">{{ $article->title }}</a></td>
        <td><a href="{{ Route('home.author', $article->user_id) }}">{{ $article->user->name }}</a></td>
        <td><a href="{{ Route('home.category', $article->category_id) }}">{{ $article->category->name }}</a></td>
        <td>
            @if ($article->tags)
                @foreach ($article->tags as $tag)
                <i class="fa fa-tag"><a href="{{ Route('home.tag', $tag->id) }}">{{ $tag->name }}</a> </i>
                @endforeach
            @endif
        </td>
        <td>{{ $article->comments->count() }}</td>
        <td>{{ $article->published_at->diffForHumans() }}</td>
        <td>
            {!! Form::open(['method' => 'get', 'url' => 'admin/article/'.$article['id'].'/edit', 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edite
                </button>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'delete', 'url' => 'admin/article/'.$article['id'], 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" class="btn btn-sm btn-danger iframe cboxElement">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            {!! Form::close() !!}        
        </td>
    </tr>
@endforeach
</table>


<div class="container text-center">
{!! $articles->render() !!} 
</div>

@endsection
