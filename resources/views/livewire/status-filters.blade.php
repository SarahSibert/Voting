<nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10 ">
        <li><a wire:click.prevent="setStatus('All')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'All') border-blue-400 text-gray-900 @endif">All Ideas ({{ $statusCount['all_statuses'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Considering')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'Considering') border-blue-400 text-gray-900 @endif">Considering ({{ $statusCount['considering'] }})</a></li>
        <li><a wire:click.prevent="setStatus('In Progress')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'In Progress') border-blue-400 text-gray-900 @endif">In Progress ({{ $statusCount['in_progress'] }})</a></li>
    </ul>
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a wire:click.prevent="setStatus('Implemented')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'Implemented') border-blue-400 text-gray-900 @endif">Implemented ({{ $statusCount['implemented'] }})</a></li>
        <li><a wire:click.prevent="setStatus('Closed')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if ($status=== 'Closed') border-blue-400 text-gray-900 @endif">Closed ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>