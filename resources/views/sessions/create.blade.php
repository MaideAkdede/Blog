<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
                <h1 class="text-center font-bold text-xl">Login!</h1>

                <form action="/sessions" method="POST" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email"/>
                    <x-form.input name="password" type="password"/>

                    <x-submit-button>Login</x-submit-button>
                </form>
            </main>
        </section>
    </x-slot>
</x-layout>
