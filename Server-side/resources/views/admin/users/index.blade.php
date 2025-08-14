@extends('layouts.master')
@section('title', 'User')
@section('users')
    <div class="p-6">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-4 border-b border-gray-200 flex flex-col justify-between">
                <h2 class="text-xl font-semibold text-gray-700">User List</h2>
                <p class="text-sm text-gray-500 mt-1">Manage User details</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-50 uppercase text-xs text-gray-500 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left">N <sup>0</sup></th>
                            <th class="px-6 py-3 text-left">Full Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Contact</th>
                            <th class="px-6 py-3 text-left">Address</th>
                            <th class="px-6 py-3 text-left">Role</th>
                            <th class="px-6 py-3 text-right text-red-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($users as $index => $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->phone }}</td>
                                <td class="px-6 py-4">{{ $user->address }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold rounded bg-indigo-100 text-indigo-600">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 transition">
                                        {!! icon_edit() !!}
                                    </a>
                                    <a href="#" class="text-red-500 hover:text-red-700 transition">
                                        {!! icon_delete() !!}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
