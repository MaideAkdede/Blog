<x-layout>
    <x-slot name="mainContent">
        <h1> {{ $page_title }}</h1>
        @if($categories->count())
            @foreach ($categories as $category)
                <ul>
                    <li><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                        - {{ $category->posts->count() }}</li>
                </ul>
            @endforeach
        @else
            <p>Il n'y a pas de catégories</p>
        @endif

        <a href="/">Go Back</a>
    </x-slot>
    <x-slot name="mainTitle">
        {{ $page_title }}
    </x-slot>
</x-layout>
