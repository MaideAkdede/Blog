<x-layout>
    <x-slot name="mainContent">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
                <h1 class="text-center font-bold text-xl">Register!</h1>
                <form action="/register" method="POST" class="mt-10">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="name">Name</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               value="{{old('name')}}"
                        >
                        <x-error-message field="name"/>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="username">Username</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="username"
                               placeholder="user-name-example"
                               id="username"
                               value="{{old('username')}}"
                        >
                        <x-error-message field="username"/>

                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="email">Email</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="email"
                               name="email"
                               id="email"
                               value="{{old('email')}}"
                        >
                        <x-error-message field="email"/>

                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="password">password</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password"
                               id="password"
                               value="{{old('password')}}"
                        >
                        <x-error-message field="password"/>

                    </div>
                    <div class="mb-6">
                        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                                type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </main>
        </section>
    </x-slot>
</x-layout>
