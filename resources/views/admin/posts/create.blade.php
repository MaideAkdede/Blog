<x-layout>
    <x-setting-page heading="Publish New Post">
        <form action="/admin/posts"
              method="POST"
              enctype="multipart/form-data"
        >
            @csrf
            <x-form.field>
                <div  x-data="{slug:''}">
                    <x-form.input name="title"  x-model="slug"/>
                    <x-form.input name="slug" x-bind:value="slugify(slug).toLowerCase()"/>
                </div>
            </x-form.field>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>
            <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category">category</label>
                <select class="rounded px-4 py-2"
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
                <x-form.error-message field="category_id"/>
            </x-form.field>
            <x-form.input name="thumbnail" type="file"/>
            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting-page>
</x-layout>
