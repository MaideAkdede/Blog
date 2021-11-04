<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
                <h1 class="text-center font-bold text-xl">Register!</h1>
                <form action="/register" method="POST" class="mt-10">
                    @csrf
                    <x-form.input name="name"/>
                    <x-form.input name="username"/>
                    <x-form.input name="email" type="email"/>
                    <x-form.input name="password" type="password"/>

                    <x-form.field>
                        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                                type="submit">
                            Submit
                        </button>
                    </x-form.field>
                </form>
            </main>
        </section>
    </x-slot>
</x-layout>
