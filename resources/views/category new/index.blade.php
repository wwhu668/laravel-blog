@extends('app')
@section('content')
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>P-Name</th>
        <th>Created_at</th>
        <th>Action</th>
    </tr>
    @foreach($category as $key=>$category)
    <tr>
        <td>{{ $category['id'] }}</td>
        <td>
            @if ($category['pid'] != 0)
                &nbsp;&nbsp;&nbsp;&nbsp;{{ $category['name'] }}
            @else   
                {{ $category['name'] }}
            @endif
        </td>
        <td>{{ $category['pid'] }}</td>
        <td>{{ $category['created_at'] }}</td>
        <td>
            <button type="button" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edite
            </button>
            <button type="button" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
            </button>
        </td>
    </tr>
    @endforeach
</table>
@endsection('content')
