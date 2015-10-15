@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tag</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>标签</th>
        <th>文章</th>
        <th>日期</th>
        <th>操作</th>
    </tr>
@foreach($tags as $tag)
    <tr>
        <td>{{ $tag->id }}</td>
        <td><a href="{{ Route('home.tag', $tag->id) }}">{{ $tag->name }}</a></td>
        <td><a href="{{ Route('home.tag', $tag->id) }}">{{ $count = $tag->articles->count() }}</a></td>
        <td>{{ $tag->updated_at->diffForHumans() }}</td>
        <td>
            {!! Form::open(['method' => 'get', 'url' => 'admin/tag/'.$tag['id'].'/edit', 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edite
                </button>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'delete', 'url' => 'admin/tag/'.$tag['id'], 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit"
                    @if ($count)
                        disabled
                    @endif
                     class="btn btn-sm btn-danger iframe cboxElement">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            {!! Form::close() !!}        
        </td>
@endforeach
</table>


<div class="container text-center">
{!! $tags->render() !!} 
</div>

@endsection
