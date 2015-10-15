@extends('default', ['title' => $type.':'.$name, 'keywords' => $type.':'.$name, 'description' => $type.':'.$name])

@section('content')
    @include('home.header')
    @foreach ($articles as $article)
        @include('home.article')
    @endforeach

<div class="container">
{!! $articles->render() !!} 
</div>
@stop
