{{-- for the image I using the Alpine.js --}}
<section class="space-y-6 bg-white w-[30%] p-6 rounded-2xl ">
    <form id="ajax-crub"action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Add Information</h2>
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

        <!-- Profile Picture -->
        <figure class="flex flex-col items-center gap-4 border border-gray-200 rounded-lg p-4 bg-gray-50">
            <label class="block text-gray-700 font-medium">Profile Picture</label>

            <img class="image-preview hidden w-20 h-20 object-cover rounded-full border border-gray-300 shadow-sm" />

            <input type="file" name="profile_picture" accept="image/*" id="customFileInput"
                class="image-input hidden" />

            <label for="customFileInput"
                class="px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-lg transition">
                <i class="fa-solid fa-image mr-1"></i> Add Photo
            </label>

            @error('profile_picture')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </figure>

        {{-- Name Fields --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label for="first_name" class="block text-left text-gray-700 font-medium mb-1">First Name</label>
                <input type="text" name="first_name" id="first_name"
                    class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="first name">
                @error('first_name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div>
                <label for="last_name" class="block text-left text-gray-700 font-medium mb-1">Last Name</label>
                <input type="text" name="last_name" id="last_name"
                    class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="last name">
                @error('last_name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Gender & DOB -->
        <div class="grid md:grid-cols-2 md:gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Gender</label>
                <div class="flex items-center text-gray-700 gap-4">
                    <label class="inline-flex items-center gap-2">
                        <input type="radio" name="gender" value="male" class="text-blue-600 focus:ring-blue-500"
                            {{ old('gender') === 'male' ? 'checked' : '' }}>
                        <span>Male</span>
                    </label>
                    <label class="inline-flex items-center gap-2">
                        <input type="radio" name="gender" value="female" class="text-blue-600 focus:ring-blue-500"
                            {{ old('gender') === 'female' ? 'checked' : '' }}>
                        <span>Female</span>
                    </label>
                </div>
                @error('gender')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                <input type="date" name="date_of_birth"
                    class="w-full rounded-lg text-gray-700 border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500" />
                @error('date_of_birth')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Email -->
        <div>
            <label for="email" class="block text-left text-gray-700 font-medium mb-1">Email Address</label>
            <input type="email" name="email" id="email"
                class="w-full px-4 py-2 border text-gray-700 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="Email">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- password -->
        <div class="relative z-0 w-full group">
            <label for="password" class="block text-left text-gray-700 font-medium mb-1">Password</label>
            <input type="password" name="password" id="password"
                class="w-full px-4 py-2 border text-gray-700 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="password">
            <button type="button" onclick="togglePassword('password', this)"
                class="absolute right-2 top-[33px] text-gray-700 hover:text-gray-600">
                <i class="fa fa-eye"></i>
            </button>
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- Address -->
        <div>
            <label for="address" class="block text-left text-gray-700 font-medium mb-1">Email Address</label>
            <input type="text" name="address" id="address"
                class="w-full px-4 py-2 border text-gray-700 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="Address">
            @error('address')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- Phone -->
        <div>
            <label for="phone" class="block text-left text-gray-700 font-medium mb-1">Conact Number</label>
            <input type="text" name="phone" id="phone"
                class="w-full px-4 py-2 border text-gray-700 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                placeholder="Contact Number">
            @error('phone')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- Submit -->
        <button type="submit"
            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
            Submit
        </button>

    </form>
</section>
<script src="{{ asset('js/image-preview.js') }}"></script>
<script src="{{ asset('js/formInput.js') }}"></script>
