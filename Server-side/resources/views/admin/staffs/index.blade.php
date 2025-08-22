@extends('layouts.master')
@section('title', 'Staff')
@section('staffs')
    <main class="p-6">
        <section class="bg-white shadow-xl rounded-lg overflow-hidden">
            <section class="p-4 border-b border-gray-200 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Staff List</h2>
                    <p class="text-sm text-gray-500 mt-1">Manage Staff details</p>
                </div>
                <button data-action="show" data-modal-url="{{ route('staff.form') }}"
                    class="inline-block px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                    + Add Staff
                </button>
            </section>
            <section class="overflow-x-auto">
                <table id="staff-table" class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-50 uppercase text-xs text-gray-500 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left">N <sup>0</sup></th>
                            <th class="px-6 py-3 text-left">Profile</th>
                            <th class="px-6 py-3 text-left">Full Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Contact</th>
                            <th class="px-6 py-3 text-left">Address</th>
                            <th class="px-6 py-3 text-left">Role</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($staffs as $index => $member)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                {{-- profile --}}
                                <td class="px-6 py-4">
                                    <img src="{{ asset($member->profile_picture) }}" alt="profile"
                                        class="w-[60px] h-[60px] object-cover rounded-full">
                                </td>
                                {{-- full name --}}
                                <td class="px-6 py-4 font-medium">
                                    {{ fullName($member) }}
                                </td>
                                {{-- email --}}
                                <td class="px-6 py-4">{{ $member->email }}</td>
                                {{-- phone number --}}
                                <td class="px-6 py-4">{{ $member->phone }}</td>
                                {{-- address --}}
                                <td class="px-6 py-4">{{ $member->address }}</td>
                                {{-- role --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-medium rounded
                                        {{ $member->role === 'admin' ? 'bg-red-100 text-red-600' : ($member->role === 'HR' ? 'bg-amber-100 text-amber-600' : 'bg-green-100 text-green-600') }}">
                                        {{ ucfirst($member->role) }}
                                    </span>
                                </td>
                                {{-- status --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-medium rounded
                                        {{ $member->status === 'active' ? 'bg-green-100 text-green-600' : ($member->status === 'on_leave' ? 'bg-yellow-100 text-yellow-600' : 'bg-gray-200 text-gray-600') }}">
                                        {{ ucfirst(str_replace('_', ' ', $member->status)) }}
                                    </span>
                                </td>
                                {{-- actions --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center space-x-2 justify-end">
                                        <button data-action="show" data-modal-url="{{ route('staff.edit', $member->id) }}">
                                            {!! icon_edit() !!}
                                        </button>
                                        <button data-action="show"
                                            data-modal-url="{{ route('staff.delete', $member->id) }}">
                                            {!! icon_delete() !!}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            {{-- sectin modal --}}
            <section>
                <div id="createStatusModal" class="fixed inset-0 bg-gray-700 bg-opacity-50 overflow-y-auto z-50 hidden ">
                    <!-- Modal Body -->
                    <div class="relative top-20 mx-auto flex items-center justify-center rounded-lg w-fullf p-6">
                        <div class="p-6 space-y-6">
                            <!-- This is where place for dynamic modal show -->
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
    {{-- scope js --}}
    <script src="{{ asset('js/custome.js') }}"></script>
    <script>
        // JavaScript functions to show/hide modal
        function showModal() {
            document.getElementById('createStatusModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createStatusModal').classList.add('hidden');
        }
        // Close modal when clicking outside
        document.getElementById('createStatusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
{{-- note: success button --}}
@if (session()->has('sweet-alert'))
    <x-sweet-alert :type="session('type')" :message="session('alert-message')" />
@endif
@if ($errors->any())
    <x-sweet-alert :type="session('type')" :message="session('alert-message')" />
@endif
