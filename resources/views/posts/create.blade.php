<x-layout>
    <section>
        <x-slot name="mainContent">
            <x-panel class="max-w-sm mx-auto">
                <h1 class="text-center font-bold text-xl">Publish New Post</h1>
                <form action="/admin/posts"
                      method="POST"
                      enctype="multipart/form-data"
                >
                    @csrf
                    <div class="mb-6 mt-6"
                         x-data="{slug:''}">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="title">Title</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               x-model="slug"
                        >
                        <x-error-message field="title"/>
                        <div class="mb-6 mt-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                   for="slug">Slug</label>
                            <input class="border border-gray-400 p-2 w-full"
                                   type="text"
                                   name="slug"
                                   id="slug"
                                   x-bind:value="slugify(slug).toLowerCase()"
                            >
                            <x-error-message field="slug"/>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="excerpt">excerpt</label>
                        <textarea class="border border-gray-400 p-2 w-full"
                                  name="excerpt"
                                  id="excerpt"
                        >{{old('excerpt')}}</textarea>
                        <x-error-message field="excerpt"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="body">body</label>
                        <textarea class="border border-gray-400 p-2 w-full"
                                  name="body"
                                  id="body"
                        >{{old('body')}}</textarea>
                        <x-error-message field="body"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="category">category</label>
                        <select class="rounded-full px-4 py-2"
                                name="category_id"
                                id="category">
                            @foreach(\App\Models\Category::all() as $category)
                                <option
                                    @if(old('category_id') === $category->id)
                                    selected
                                    @endif
                                    value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        <x-error-message field="category_id"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="thumbnail">Thumbnail</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="file"
                               name="thumbnail"
                               id="thumbnail"
                        >
                        <x-error-message field="thumbnail"/>
                    </div>
                    <x-submit-button>Publish</x-submit-button>
                </form>
            </x-panel>
        </x-slot>
    </section>
</x-layout>
