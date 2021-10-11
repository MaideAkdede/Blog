@props(['trigger', 'entries'])

<div x-data="{ show: false}" @click.away="show=false">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    {{-- Entries - Items - Links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 rounded-xl w-full z-50 mt-2" style="display: none">
        {{ $entries }}
    </div>
</div>
