@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Comment</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<table class="table table-hover">
    <tr>
        <th>文章</th>
        <th>用户</th>
        <th>邮箱</th>
        <th>RUL</th>
        <th>日期</th>
    </tr>
@foreach($comments as $comment)
    <tr>
        <td><a href="{{ Route('home.show', $comment->article_id) }}">{{ $comment->article->title}}</a></td>
        <td>{{ $comment->username }}</td>
        <td> {{ $comment->email }} </td>
        <td> {{ $comment->url }} </td>
        <td>{{ $comment->created_at->diffForHumans() }}</td>
    </tr>
@endforeach
</table>
@endsection


