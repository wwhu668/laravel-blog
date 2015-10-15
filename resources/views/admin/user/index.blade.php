@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>用户</th>
        <th>邮箱</th>
        <th>权限</th>
        <th>日期</th>
        <th>操作</th>
    </tr>
@foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->level }}</td>
        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>
            {!! Form::open(['method' => 'get', 'url' => 'admin/user/'.$user['id'].'/edit', 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" disabled class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edite
                </button>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'delete', 'url' => 'admin/user/'.$user['id'], 'style' => 'float:left;margin-right: 10px;']) !!}
                <button type="submit" disabled class="btn btn-sm btn-danger iframe cboxElement">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            {!! Form::close() !!}        
        </td>
    </tr>
@endforeach
</table>

@endsection


