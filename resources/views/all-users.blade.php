<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-5xl text-center">
                    {{ __("All users") }}
                </div>
                <table class="table-fixed w-full h-full border border-slate-500">
                    <thead>
                        <tr class="">
                            <th class="dark:text-gray-100 text-xl">Name</th>
                            <th class="dark:text-gray-100 text-xl">Email</th>
                            <th class="dark:text-gray-100 text-xl">Role</th>
                            <th colspan="2" class="dark:text-gray-100 text-xl">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)

                        <tr
                            class="dark:text-gray-100 round transition hover:delay-150 hover:duration-300 hover:ease-in-out text-lg">
                            <th class="hover:bg-slate-500 rounded">{{$user->name}}</th>
                            <th class="hover:bg-slate-500 rounded">{{$user->email}}</th>
                            <th class="hover:bg-slate-500 rounded">{{$user->role}}</th>
                            <th class="hover:bg-red-500 hover:text-gray-100 rounded"><a href="route('')">Delete</a></th>
                            <th class="hover:bg-blue-500 hover:text-gray-100 rounded"><a class="w-full h-full"
                                    href="route('')">Edit</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
