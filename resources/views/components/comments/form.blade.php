@props(['post'])

<h2 class="mb-4 text-3xl font-bold text-center">Want to participate ?</h2>
@guest()
    <p class="text-center"><a href="/resgister" class="font-bold underline hover:text-blue-500">Register</a> or <a
            href="/login" class="font-bold underline hover:text-blue-500">Login</a> to add a comment</p>
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
        <x-form.textarea name="body" placeholder="What are your thoughts? Tell us about it!"/>
        <div class="flex justify-end">
           <x-submit-button>Post my comment</x-submit-button>
        </div>
    </form>
@endguest
