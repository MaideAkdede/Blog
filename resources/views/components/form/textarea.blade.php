@props(['name', 'placeholder'])

<x-form.field>
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{ $name }}">{{ $name }}</label>
    <textarea class="border border-gray-400 p-2 w-full"
              name="{{ $name }}"
              id="{{ $name }}"
              placeholder="{{ $placeholder ?? ''}}"
    >{{old( $name )}}</textarea>
    <x-form.error-message field="{{ $name }}"/>
</x-form.field>
