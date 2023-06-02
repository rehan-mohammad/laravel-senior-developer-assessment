<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Soft Deleted Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full border border-gray-300">
                        <thead>
                        <tr>
                            <td class="border px-6 py-4">Id</td>
                            <td class="border px-6 py-4">First Name</td>
                            <td class="border px-6 py-4">Last Name</td>
                            <td class="border px-6 py-4">Email</td>
                            <td class="border px-6 py-4">Type</td>
                            <td class="border px-6 py-4">Deleted At</td>
                            <td class="border px-6 py-4">Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->firstname }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->lastname }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->type }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->deleted_at }}</td>
                                <td class="border px-6 py-4">
                                    <a href="{{ route('users.restore', $user->id) }}" class="inline-block px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-700">Restore</a>
                                    <a href="{{ route('users.permadestroy', $user->id) }}" class="inline-block px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-700">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
