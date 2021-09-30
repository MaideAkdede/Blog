<x-layout>
    <x-slot name="mainContent">
        <h1>Hello world</h1>
        @foreach ($posts as $post)
            <article>
                <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <p>Published on : <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans()}}</time></p>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </x-slot>
    <x-slot name="mainTitle">
        {{ $page_title }}
    </x-slot>
</x-layout>
