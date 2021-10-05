<x-layout>
    <x-slot name="mainContent">
        <h1>{{ $post->title }}</h1>
        <p><a href="">{{ $post->category->name }}</a></p>
        <p>Written by : <a href="/users/{{ $post->user->slug }}">{{ $post->user->name }}</a>
        </p>
        <p>Published on : <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans()}}</time></p>
        <p>{!! $post->body !!}</p>
        <a href="/">Go Back</a>
    </x-slot>
    <x-slot name="mainTitle">
        {{ $page_title }}
    </x-slot>
</x-layout>

