
@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Tag</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
{!! Form::model($tag, ['method' => 'PATCH', 'url' => 'admin/tag/'.$tag->id] ) !!}
    @include('admin.tag._form', ['submitButtonText' => 'Edit Tag'])
{!! Form::close() !!}

@include('errors.form')
@endsection

