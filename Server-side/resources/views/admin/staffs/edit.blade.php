<section class="space-y-6 bg-white w-[30%] p-6 rounded-2xl">
    <form id="ajax-crub" action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Edit Staff Information</h2>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                onclick="closeModal()">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </section>


        {{-- Image Upload Section --}}
        <figure class="flex flex-col items-center gap-4 border border-gray-200 rounded-lg p-4 bg-gray-50"
            id="previewWrapper">
            <label class="block text-gray-700 font-medium">Profile Picture</label>

            <img id="thumbnailPreview" src="{{ asset($staff->profile_picture ?? '') }}"
                class="w-20 h-20 object-cover rounded-full border shadow-sm {{ $staff->profile_picture ? '' : 'hidden' }}">

            <input type="file" name="profile_picture" id="imageInput" accept="image/*" class="hidden">
            <label onclick="document.getElementById('imageInput').click()"
                class="px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-lg transition">
                <i class="fa-solid fa-image mr-1"></i> Change Photo
            </label>
        </figure>
        {{-- Name Fields --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label for="first_name" class="block text-left text-gray-700 font-medium mb-1">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ $staff->first_name }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            </div>

            <div>
                <label for="last_name" class="block text-left text-gray-700 font-medium mb-1">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ $staff->last_name }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            </div>
        </div>
        {{-- Date of Birth --}}
        <div>
            <label for="date_of_birth" class="block text-left text-gray-700 font-medium mb-1">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth"
                value="{{ old('date_of_birth', $staff->date_of_birth ? $staff->date_of_birth->format('Y-m-d') : '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>

        {{-- Address --}}
        <div>
            <label for="address" class="block text-left text-gray-700 font-medium mb-1">Address</label>
            <input type="text" name="address" id="address" value="{{ $staff->address }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>

        {{-- Phone --}}
        <div>
            <label for="phone" class="block text-left text-gray-700 font-medium mb-1">Phone Number</label>
            <input type="text" name="phone" id="phone" value="{{ $staff->phone }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium shadow transition">
                <i class="fa-solid fa-save mr-1"></i> Update
            </button>
        </div>
    </form>
</section>
<script src="{{ asset('js/formInput.js') }}"></script>
