<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View User ').$user->email }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <tbody>
                        <tr>
                            <td class="py-2 font-bold">ID:</td>
                            <td class="py-2">{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Email:</td>
                            <td class="py-2">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Email Verified At:</td>
                            <td class="py-2">{{ $user->email_verified_at }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Password:</td>
                            <td class="py-2">{{ $user->password }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Remember Token:</td>
                            <td class="py-2">{{ $user->remember_token }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Created At:</td>
                            <td class="py-2">{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Updated At:</td>
                            <td class="py-2">{{ $user->updated_at }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Prefix Name:</td>
                            <td class="py-2">{{ $user->prefixname }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">First Name:</td>
                            <td class="py-2">{{ $user->firstname }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Middle Name:</td>
                            <td class="py-2">{{ $user->middlename }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Last Name:</td>
                            <td class="py-2">{{ $user->lastname }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Suffix Name:</td>
                            <td class="py-2">{{ $user->suffixname }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Photo:</td>
                            <td class="py-2">{{ $user->photo }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-bold">Type:</td>
                            <td class="py-2">{{ $user->type }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
