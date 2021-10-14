<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>
    {{--<h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg"
                                                       alt="Head of Lary the mascot"></h2>--}}


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>
                {{-- Trigger --}}
                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                        {{ isset($currentCategory) ? $currentCategory->name : 'Categories'}}
                        <x-svg.down-arrow class="absolute pointer-events-none" style="right: 12px;"/>
                    </button>
                </x-slot>
                {{-- Items - Links --}}
                <x-slot name="entries">
                    <x-dropdown-item href="/"
                                     :active="request()->routeIs('home')">
                        All posts
                    </x-dropdown-item>
                    @foreach($categories as $category)
                        <x-dropdown-item href="/categories/{{ $category->slug }}"
                                         :active="isset($currentCategory) && $currentCategory->is($category)">
                            {{ $category->name }}
                        </x-dropdown-item>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Authors Filter -->
    {{--<div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
        <div x-data="{ show: false}" @click.away="show=false">
            <button @click="show=!show"
                    class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">

                Authors

                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                     height="22" viewBox="0 0 22 22">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path fill="#222"
                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                    </g>
                </svg>
            </button>
            <div x-show="show" class="py-2 absolute bg-gray-100 rounded-xl w-full z-50 mt-2" style="display: none">
                @foreach($users as $user)
                    <a href="/users/{{ $user->slug }}"
                       class="block text-left px-3 text-sm leading-7 hover:bg-blue-500 focus:bg-blue-500 mt-2 hover:text-white focus:text-white">{{ $user->name }}</a>
                @endforeach
            </div>
        </div>
    </div>--}}

    <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="">
                <input
                    type="text"
                    name="search"
                    placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{request('search')}}"
                >
            </form>
        </div>
    </div>
</header>
