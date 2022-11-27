@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex justify-center items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled px-5 bg-gray-400 py-2 mx-2 text-white rounded-lg" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a class="px-5 bg-purple-600 py-2 mx-2 text-white rounded-lg hover:bg-purple-700" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled px-5 bg-gray-400 py-2 mx-2 text-white rounded-lg" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active px-5 bg-purple-400 py-2 mx-2 text-white rounded-lg hover:bg-purple-700" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a class="px-5 bg-purple-600 py-2 mx-2 text-white rounded-lg hover:bg-purple-700" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="px-5 bg-purple-600 py-2 mx-2 text-white rounded-lg hover:bg-purple-700">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class=" px-5 bg-gray-400 py-2 mx-2 text-white rounded-lg disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
