<x-layout>
    <x-slot name="mainContent">
        <h1> {{ $page_title }}</h1>
        @if($users->count())
            @foreach ($users as $user)
                <ul>
                    <li><a href="/users/{{ $user->slug }}">{{ $user->name }}</a> - {{ $user->posts->count() }}</li>
                </ul>
            @endforeach
        @else
            <p>No user registered at the moment</p>
        @endif

        <a href="/">Go Back</a>
    </x-slot>
    <x-slot name="mainTitle">
        {{ $page_title }}
    </x-slot>
</x-layout>
