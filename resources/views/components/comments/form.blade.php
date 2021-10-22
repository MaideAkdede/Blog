@props(['post'])

<h2 class="mb-4 text-3xl font-bold text-center">Want to participate ?</h2>
@guest()
    <p class="text-center"><a href="/resgister" class="font-bold underline hover:text-blue-500">Register</a> or <a href="/login" class="font-bold underline hover:text-blue-500">Login</a> to add a comment</p>
@else
    <form action="/posts/{{ $post->id }}/comments" method="POST" class="mt-10"
    class="">
        @csrf
        <header class="flex items-center mb-4">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
                 width="40" height="40"
                 alt=""
                 class="mr-4 rounded-full">
            <label for="body" class="font-bold">Add a comment</label>
        </header>
        <textarea placeholder="What are your thoughts, tell us about it!" class="p-2 w-full border border-gray-400" name="body" id="body" cols="30" rows="10"></textarea>
        <div class="flex justify-end">
            <button class="py-2 px-4 mt-4 font-bold text-white uppercase bg-blue-400 rounded hover:bg-blue-500" type="submit">POST</button>
        </div>
    </form>
@endguest
