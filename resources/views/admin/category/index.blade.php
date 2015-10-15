@extends('app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>类别</th>
        <th>上级类</th>
        <th>Created_at</th>
        <th>Article Count</th>
        <th>Action</th>
    </tr>
    @foreach($category as $key=>$category)
    <tr>
        <td>{{ $category['id'] }}</td>
        <td><a href="{{ Route('home.category', $category->id) }}">
            @if ($category['pid'] != 0)
                &nbsp;&nbsp;&nbsp;&nbsp;{{ $category['name'] }}
            @else   
                {{ $category['name'] }}
            @endif
            </a>
        </td>
        <td>{{ $category['pid'] }}</td>
        <td>{{ $category['created_at'] }}</td>
        <td><a href="{{ Route('home.category', $category->id) }}">{{ $count = \App\Article::where('category_id', '=', $category['id'])->count() }}</a></td>
        <td>
            {!! Form::open(['method' => 'get', 'url' => 'admin/category/'.$category['id'].'/edit', 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edite
                </button>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'delete', 'url' => 'admin/category/'.$category['id'], 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" 
                    @if ($count)
                        disabled 
                    @endif
                    class="btn btn-sm btn-danger iframe cboxElement">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            {!! Form::close() !!}        
        </td>
    </tr>
    @endforeach
</table>
@endsection('content')

