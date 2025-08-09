@extends('layouts.master')
@section('title', 'Staff')
@section('staffs')
    <div class="p-6">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Staff List</h2>
                    <p class="text-sm text-gray-500 mt-1">Manage Staff details</p>
                </div>
                <a href="{{ route('staff.form') }}" data-tile="Resgister"
                    class="inline-block px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                    + Add Staff
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-50 uppercase text-xs text-gray-500 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left">N <sup>0</sup></th>
                            <th class="px-6 py-3 text-left">Full Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Role</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($staffs as $index => $member)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <!-- Profile image + full name -->
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    {{-- <img src="{{ $member->profile_picture ?? 'https://via.placeholder.com/40x40?text=👤' }}"
                                        alt="{{ $member->full_name }}"
                                        class="w-10 h-10 rounded-full object-cover border border-gray-300"> --}}
                                    <span class="font-medium">{{ fullName($member) }}</span>
                                </td>
                                <td class="px-6 py-4">{{ $member->email }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-medium rounded
                                {{ $member->role === 'admin' ? 'bg-red-100 text-red-600' : ($member->role === 'HR' ? 'bg-amber-100 text-amber-600' : 'bg-green-100 text-green-600') }}">
                                        {{ ucfirst($member->role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-medium rounded
                                {{ $member->status === 'active' ? 'bg-green-100 text-green-600' : ($member->status === 'on_leave' ? 'bg-yellow-100 text-yellow-600' : 'bg-gray-200 text-gray-600') }}">
                                        {{ ucfirst(str_replace('_', ' ', $member->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    {{-- {{ route('staff.edit', $member->id) }} --}}
                                    <a href="{{ route('staff.edit', $member->id) }}"
                                        class="text-indigo-500 hover:text-indigo-700">
                                        {!! icon_edit() !!}
                                    </a>
                                    {{-- {{ route('staff.destroy', $member->id) }} --}}
                                    <form action="#" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="text-red-500 hover:text-red-700">
                                            {!! icon_delete() !!}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
