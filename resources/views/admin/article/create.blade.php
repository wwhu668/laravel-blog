@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Article</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
{!! Form::open(['url' => 'admin/article']) !!}
    @include('admin.article._form', ['submitButtonText' => 'Add Article'])
{!! Form::close() !!}


@include('errors.form')
@endsection

@section('footer')
@include('admin.article.footer');
@stop
