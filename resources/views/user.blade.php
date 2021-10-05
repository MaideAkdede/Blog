<x-layout>
    <x-slot name="mainContent">
        <h1>User : <em>{{ $user->name }}</em></h1>
        @foreach ($user->posts as $post)
            <article>
                <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <p>Published on : <time datetime="{{ $post->published_at }}">{{ $post->published_at->diffForHumans()}}</time></p>
                <p><a href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
        <a href="/users">Go Back</a>
    </x-slot>
    <x-slot name="mainTitle">
        {{ $page_title }}
    </x-slot>
</x-layout>
