<div 
    x-cloak
    x-data="{ isOpen: false}"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @custom-show-edit-modal.window="isOpen = true"
    class="fixed z-10 inset-0 overflow-y-auto" 
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true">

    <div class="flex items-end justify-center min-h-screen">
        <!-- grey background overlay -->
        <div 
            x-show.transition.opacity="isOpen"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
        </div>

        <!-- MODAL -->
        <div 
            x-show.transition.origin.bottom.duration.300ms="isOpen"
            class="modal bg-white rounded-tl-xl rounded-tr-xl p-4 overflow-hidden transform transition-all sm:max-w-lg sm:w-full">
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button 
                    class="text-gray-400 hover:text-gray-500"
                    @click="isOpen = false"
                    >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="bg-white px-4 pt-5 sm:p-6 sm:pb-4">
                <h3 class="text-center text-lg font-medium text-gray-900">Edit Idea</h3>
                <p class="text-xs text-center text-gray-500 mt-4 px-6 ">You have one hour to edit your hour after you have created it.</p>
                <form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input wire:model.defer="title" type="text" class="w-full bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2 text-sm" placeholder="Your Idea">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <select wire:model.defer="category" name="category_add" id="category_add" class="w-full bg-gray-100 border-none rounded-xl px-4 py-2 text-sm">
                                <option value="1">Category 1</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl placeholder-gray-900 text-sm px-4 py-2 border-none" placeholder="Describe Your Idea"></textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-between space-x-3">
                        <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                            <svg class="w-4 h-4 text-gray-600 transform -rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>
                        <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-500 font-semibold rounded-xl border border-blue-500 hover:bg-blue-700 transition duration-150 ease-in px-6 py-3 text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>