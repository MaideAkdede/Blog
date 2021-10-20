@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(()=> show = false, 4000)"
         x-show="show"
         class="fixed bottom-4 right-4 bg-blue-500 text-white p-4 rounded-2xl">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif
