@extends('default', ['title' => $setups->title.' | '.$setups->subtitle, 'keywords' => $setups->keyword, 'description' => $setups->description])
@section('content')		
    @foreach ($articles as $article)
    @include('home.article')
    @endforeach

<div class="container">
{!! $articles->render() !!} 
</div>
@stop
