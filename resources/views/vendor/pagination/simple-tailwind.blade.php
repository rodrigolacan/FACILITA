@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-8">
        {{-- Link para a página anterior --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 border cursor-default leading-5 rounded-md bg-gray-200 border-gray-300 mr-2">
                Anterior
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white border leading-5 rounded-md bg-gray-800 border-gray-600 mr-2">
                Anterior
            </a>
        @endif

        {{-- Links para as páginas --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 leading-5 bg-gray-200 border border-gray-300 mx-1">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white leading-5 bg-gray-800 border border-gray-600 mx-1">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 leading-5 hover:text-white hover:bg-gray-800 border border-gray-300 mx-1">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Link para a próxima página --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white leading-5 border rounded-md bg-gray-800 border-gray-600 ml-2">
                Próximo
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 border leading-5 rounded-md bg-gray-200 border-gray-300 ml-2">
                Próximo
            </span>
        @endif
    </nav>
@endif
