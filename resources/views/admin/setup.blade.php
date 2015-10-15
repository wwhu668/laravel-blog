@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Setup</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

{!! Form::open(['url' => 'admin/setup/store'])!!}
    <div class="form-group">
        {!! Form::label('title', '站点标题:') !!}
        {!! Form::text('title', $setups->title, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('subtitle', '副标题:') !!}
        {!! Form::text('subtitle', $setups->subtitle, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('footer', '底部介绍:') !!}
        {!! Form::text('footer', $setups->footer, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('keyword', '关键字:') !!}
        {!! Form::text('keyword', $setups->keyword, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', '描述:') !!}
        {!! Form::text('description', $setups->description, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('edit', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
@include('errors.form')
@endsection


