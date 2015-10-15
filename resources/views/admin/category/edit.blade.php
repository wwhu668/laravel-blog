@extends('app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Category:{{ $category->name }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

{!! Form::model($category,['method' => 'PATCH', 'url' => 'admin/category/'.$category->id]) !!}
    @include('admin.category.form', ['submitButtonText' => 'Add Category'])
{!! Form::close() !!}

@include('errors.form')
@endsection('content')
