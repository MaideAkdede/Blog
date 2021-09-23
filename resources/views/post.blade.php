@extends('components.layout')

@section('main_content')
<h1>{{ $post->title }}</h1>
<p>Published on: {{ $post->date }}</p>
{!! $post->body !!}
<a href="/">Go Back</a>
@endsection

@section('main_title')
    <title>
        {{ $page_title }}
    </title>
@endsection
