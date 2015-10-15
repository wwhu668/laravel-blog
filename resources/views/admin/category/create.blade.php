
@extends('app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
{!! Form::open(['url' => '/admin/category']) !!}
    @include('admin.category.form', ['submitButtonText' => 'Add Category'])
{!! Form::close() !!}
@include('errors.form')
@endsection('content')
