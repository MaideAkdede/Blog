@props(['name'])

<x-form.field>
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{ $name }}">{{ $name }}</label>
    <textarea class="border border-gray-400 p-2 w-full rounded"
              name="{{ $name }}"
              id="{{ $name }}"
              {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>
    <x-form.error-message field="{{ $name }}"/>
</x-form.field>
