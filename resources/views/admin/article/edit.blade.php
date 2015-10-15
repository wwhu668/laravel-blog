@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Article</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
{!! Form::model($article, ['method' => 'PATCH', 'url' => 'admin/article/'.$article->id] ) !!}
    @include('admin.article._form', ['submitButtonText' => 'Edit Article'])
{!! Form::close() !!}
@include('errors.form')
@endsection

@section('footer')

@include('admin.article.footer');
@stop
