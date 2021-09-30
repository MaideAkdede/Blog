<x-layout>
    <x-slot name="mainContent">
        <h1>{{ $post->title }}</h1>
        <p>Published on: {{ $post->date }}</p>
        {!! $post->body !!}
        <a href="/">Go Back</a>
    </x-slot>
    <x-slot name="mainTitle">
        {{ $page_title }}
    </x-slot>
</x-layout>

