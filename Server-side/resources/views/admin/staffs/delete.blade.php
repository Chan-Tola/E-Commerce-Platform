<div class=" space-y-6 bg-white w-[30%] p-6 rounded-2xl relative top-56">
    <!-- Close Button -->
    <form id="ajax-delete" action="{{ route('staff.destroy', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button type="button" onclick="closeModal()"
            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-3xl font-bold focus:outline-none transition-colors"
            aria-label="Close modal">
            &times;
        </button>
        <!-- Confirmation Text -->
        <div class="text-center mb-8">
            <p class="text-lg font-semibold text-gray-700">
                Are you sure you want to delete
            </p>
        </div>
        <div class="flex justify-center gap-4 items-center ">
            <button type="submit"
                class="p-2 w-[80px] text-white bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 transition text-lg">
                Ok
            </button>
            <button type="button" onclick="closeModal()"
                class="p-2 w-[80px] bg-gray-100 rounded-lg shadow-md hover:bg-blue-300 focus:outline-none focus:ring-4 focus:ring-blue-100 transition text-lg">
                Canel
            </button>
        </div>
    </form>
    <!-- Delete Button - FIXED: Changed to type="submit" -->
</div>
