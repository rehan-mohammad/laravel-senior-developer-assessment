<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>


    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="text-gray-600">Email:</label>
                            <input required type="email" id="email" name="email" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="text-gray-600">Password:</label>
                            <input required type="password" id="password" name="password" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="prefixname" class="block text-gray-700 text-sm font-bold mb-2">
                                Prefix Name
                            </label>
                            <select id="prefixname" name="prefixname" class="form-select block w-full mt-1 rounded-md shadow-sm">
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="firstname" class="text-gray-600">First Name:</label>
                            <input required type="text" id="firstname" name="firstname" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="middlename" class="text-gray-600">Middle Name:</label>
                            <input type="text" id="middlename" name="middlename" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="lastname" class="text-gray-600">Last Name:</label>
                            <input required type="text" id="lastname" name="lastname" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="suffixname" class="text-gray-600">Suffix Name:</label>
                            <input type="text" id="suffixname" name="suffixname" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="text-gray-600">Photo:</label>
                            <input type="file" id="photo" name="photo" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="type" class="text-gray-600">Type:</label>
                            <input type="text" id="type" name="type" class="border border-gray-300 px-3 py-2 rounded-md w-full">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
