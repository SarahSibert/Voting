<nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10 ">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'All') border-blue-400 text-gray-900 @endif">All Ideas (87)</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'Considering') border-blue-400 text-gray-900 @endif">Considering (6)</a></li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'In Progress') border-blue-400 text-gray-900 @endif">In Progress (1)</a></li>
    </ul>
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'Implemented') border-blue-400 text-gray-900 @endif">Implemented (10)</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'Closed') border-blue-400 text-gray-900 @endif">Closed (55)</a></li>
    </ul>
</nav>