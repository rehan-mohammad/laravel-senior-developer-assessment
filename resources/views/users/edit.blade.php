<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="prefixname" class="block text-gray-700 text-sm font-bold mb-2">
                                Prefix Name
                            </label>
                            <select id="prefixname" name="prefixname" class="form-select block w-full mt-1 rounded-md shadow-sm">
                                <option value="Mr" {{ $user->prefixname === 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Mrs" {{ $user->prefixname === 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                <option value="Ms" {{ $user->prefixname === 'Ms' ? 'selected' : '' }}>Ms</option>
                            </select>
                            @error('prefixname')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">
                                First Name
                            </label>
                            <input id="firstname" type="text" name="firstname" value="{{ $user->firstname }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('firstname')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="middlename" class="block text-gray-700 text-sm font-bold mb-2">
                                Middle Name
                            </label>
                            <input id="middlename" type="text" name="middlename" value="{{ $user->middlename }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('middlename')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                                Last Name
                            </label>
                            <input id="lastname" type="text" name="lastname" value="{{ $user->lastname }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('lastname')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="suffixname" class="block text-gray-700 text-sm font-bold mb-2">
                                Suffix Name
                            </label>
                            <input id="suffixname" type="text" name="suffixname" value="{{ $user->suffixname }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('suffixname')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Email
                            </label>
                            <input id="email" type="email" name="email" value="{{ $user->email }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                Password
                            </label>
                            <input id="password" type="password" name="password" value="{{ $user->password }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('password')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">
                                Photo
                            </label>
                            <input id="photo" type="file" name="photo" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('photo')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">
                                Type
                            </label>
                            <input id="type" type="text" name="type" value="{{ $user->type }}" class="form-input block w-full mt-1 rounded-md shadow-sm">
                            @error('type')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">
                                Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
