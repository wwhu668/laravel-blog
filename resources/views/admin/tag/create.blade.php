@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Article</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
{!! Form::open(['url' => 'admin/tag']) !!}
    @include('admin.tag._form', ['submitButtonText' => 'Add Tag'])
{!! Form::close() !!}


@include('errors.form')
@endsection

