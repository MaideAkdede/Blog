<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @guest
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="text-xs font-bold uppercase ml-4">Login</a>
            @else
                <x-dropdown>
                    {{-- Trigger --}}
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase font-bold uppercase">
                            Welcome, {{ auth()->user()->username }}!
                        </button>
                    </x-slot>
                    {{-- Items - Links --}}
                    <x-slot name="entries">
                        @can('admin')
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                                New Post
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">All Posts</x-dropdown-item>
                        @endcan
                        <x-dropdown-item href="#"  class="text-red-500 hover:text-white hover:bg-red-500" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>
                        <form method="POST" action="/logout" id="logout-form" class="hidden">
                            @csrf
                        </form>
                    </x-slot>
                </x-dropdown>

            @endguest
            <a href="#newsletter"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    {{ $mainContent }}

    <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto">
                <form method="POST" action="/newsletter" class="flex-col">
                    @csrf
                    <div class="lg:flex text-sm lg:bg-gray-200 rounded-full">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <input id="email" type="email" name="email" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>
                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </div>
                    <x-form.error-message field="email"/>
                </form>
            </div>
        </div>
    </footer>
</section>
<x-flash/>
</body>
</html>
