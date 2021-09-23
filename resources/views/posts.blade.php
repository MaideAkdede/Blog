@extends('layout')

@section('main_content')
    <h1>Hello world</h1>
    @foreach($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p>Published on : {{ $post->date }}</p>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach
@endsection

@section('main_title')
    <title>
        {{ $page_title }}
    </title>
@endsection
