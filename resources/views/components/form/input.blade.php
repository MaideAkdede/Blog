@props(['name'])

<x-form.field>
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{ $name }}">{{ $name }}</label>
    <input class="border border-gray-400 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{old( $name )}}"
           {{ $attributes }}
    >
    <x-form.error-message field="{{ $name }}"/>
</x-form.field>
