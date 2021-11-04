<x-layout>
    <x-setting-page :heading="'Edit Post: '. $post->title">
        <form action="/admin/posts/{{$post->id}}"
              method="POST"
              enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <x-form.field>
                <x-form.input name="title" x-model="slug" :value="old('title', $post->title)"/>
                <x-form.input name="slug" value="{{old('slug', $post->slug )}}"
                              x-bind:value="slugify(slug).toLowerCase()"/>
                <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt )}}</x-form.textarea>
                <x-form.textarea name="body">{{old('body', $post->body)}}</x-form.textarea>
            </x-form.field>
            <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category">category</label>
                <select class="rounded px-4 py-2"
                        name="category_id"
                        id="category">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            @if(old('category_id', $post->category->id) === $category->id)
                            selected
                            @endif
                            value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                <x-form.error-message field="category_id"/>
            </x-form.field>
            <div
                class="flex mt-6"
            >
                <div class="flex-1">

                    <x-form.input name="thumbnail" type="file"/>
                    <p><strong>Current image: </strong>{{old('thumbnail', $post->thumbnail)}}</p>
                </div>
                <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting-page>
</x-layout>
