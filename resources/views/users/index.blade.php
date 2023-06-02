<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('users.trashed') }}" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">Show Trashed Users</a>
                        <a href="{{ route('users.create') }}" class="ml-2 inline-block px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-700">Create User</a>
                    </div>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-center font-bold">
                            <td class="border px-6 py-4">First Name</td>
                            <td class="border px-6 py-4">Last Name</td>
                            <td class="border px-6 py-4">Email</td>
                            <td class="border px-6 py-4">Type</td>
                            <td class="border px-6 py-4">Actions</td>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-6 py-4">{{$user->firstname}}</td>
                                <td class="border px-6 py-4">{{$user->lastname}}</td>
                                <td class="border px-6 py-4">{{$user->email}}</td>
                                <td class="border px-6 py-4">{{$user->type}}</td>
                                <td class="border px-6 py-4">
                                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">View</a>
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-700">Edit</a>
                                    <a href="{{ route('users.destroy', ['user' => $user->id]) }}"
                                       onclick="event.preventDefault(); document.getElementById('delete-user-{{ $user->id }}').submit();"
                                       class="inline-block px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-700">Delete</a>

                                    <form id="delete-user-{{ $user->id }}" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
