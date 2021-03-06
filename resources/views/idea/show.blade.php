<x-app-layout>
    <!-- Filters -->
    <div>
        <a href="{{ $backUrl }}" 
            class="flex items-center font-semibold hover:underline">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
            </svg>
            <span class="ml-2">All Ideas (or Back to Chosen Category with Filters)</span>
        </a>
    </div>

    <!-- Idea -->
    <livewire:idea-show
         :idea="$idea"
         :votesCount="$votesCount"
     />

    @can('update', $idea)
         <livewire:edit-idea :idea="$idea" />
    @endcan

    <!-- Comments Container -->
    <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">
        @foreach (range(1,3) as $comment)
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl" />
                    </a>
                </div>
                <div class="w-full md:mx-4">
                    <div class="text-gray-600">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non soluta natus suscipit voluptatibus dolor sed velit sint voluptates quisquam, id molestias doloremque, assumenda, debitis illum iusto blanditiis incidunt ipsam vero!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                         <div 
                            x-data="{ isOpen: false}"
                            class="flex items-center space-x-2">
                            <div class="relative">
                                <button 
                                    @click="isOpen = !isOpen" 
                                    class="relative bg-gray-100 hover:bg-gray-200 transition duration-150 ease-in rounded-full h-7 py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"></path></svg>
                                </button>
                                <ul 
                                    x-cloak
                                    x-show.transition.origin.top.left="isOpen"
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false" 
                                    class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Delete Post</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
