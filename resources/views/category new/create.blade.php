
@extends('app')
@section('content')
{!! Form::open(['url' => '/category']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('parent', 'Parent:') !!}
        {!! Form::select('pid', $categorys, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
@endsection('content')
