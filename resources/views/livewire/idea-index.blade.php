<div 
    x-data
    @click="
        const clicked = $event.target
        const target = clicked.tagName.toLowerCase()

        const ignores = ['button', 'svg', 'path', 'a']

        if (! ignores.includes(target)){
                clicked.closest('.idea-container').querySelector('.idea-link').click()
        }
    "
    class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
    <!-- Votes -->
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if($hasVoted) text-blue-500 @endif">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>
        <div class="mt-8">
            @if ($hasVoted)
                 <button wire:click.prevent="vote" class="w-20 bg-blue-500 text-white border border-blue-500 hover:bg-blue-700 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Voted</button>
             @else
                 <button wire:click.prevent="vote" class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">Vote</button>
             @endif
        </div>
    </div>
    <!-- Details -->
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <!-- Avatar -->
        <div class="mx-4 md:mx-0 flex-none">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl" />
            </a>
        </div>
        <!-- Info -->
        <div class="w-full flex flex-col justify-between mx-4">
            <h4 class="mt-2 md:mt-0 text-xl font-semibold">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>
            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <!-- Meta -->
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{$idea->category->name}}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div 
                    x-data="{ isOpen: false}"
                    class="mt-2 md:md-0 flex items-center space-x-2">
                    <button class="{{ $idea->status->getStatusClasses() }} text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">{{$idea->status->name}}</button>
                </div>
                <div class="flex items-center md:hidden mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none @if($hasVoted) text-blue-500 @endif">{{ $votesCount }}</div>
                        <div class="text-xs font-semibold leading-none text-gray-400">Votes</div>
                    </div>
                    @if ($hasVoted)
                         <button
                            wire:click.prevent="vote"
                             class="w-20 bg-blue-500 text-white border border-blue-500 font-bold text-xxs uppercase rounded-xl hover:bg-blue-700 transition duration-150 ease-in px-4 py-3 -mx-5"
                         >
                             Voted
                         </button>
                     @else
                         <button
                            wire:click.prevent="vote"
                             class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5"
                         >
                             Vote
                         </button>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>