@props(['comment'])
<x-panel>
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user->id }}"
                 width="60" height="60"
                 alt=""
                 class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ ucwords($comment->user->name) }}</h3>
                <p class="text-xs">Posted on
                    <time datetime="{{ ($comment->user->created_at)}}">{{ ($comment->user->created_at)->format('d M Y')}} at {{ ($comment->user->created_at)->format('H:i')}} </time>
                </p>
            </header>
            <p>{{ $comment->body }}</p>
        </div>
    </article>
</x-panel>
