@props(['posts'])
<x-post-featured-card :post="$posts->first()"/>
@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            @if ($loop->iteration < 3 )
                <x-post-card :post="$post" class="col-span-3"/>
            @else
                <x-post-card :post="$post" class="col-span-2"/>
            @endif
        @endforeach
    </div>
@endif
