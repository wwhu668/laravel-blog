@extends('app')
@section('content')
{!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('name', 'name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('url', 'url:') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('icon', 'icon:') !!}
        {!! Form::text('icon', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
@endsection('content')
