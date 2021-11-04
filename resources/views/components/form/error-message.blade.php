@props(['field'])

@error($field)
<span class="text-red-500 text-xs mt-2">
    {{$message}}
</span>
@enderror
