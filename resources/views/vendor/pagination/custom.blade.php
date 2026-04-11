@if ($paginator->hasPages())
    <div class="brz-posts__pagination">
        <ul class="page-numbers">
            {{-- Lien précédent --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="page-numbers prev" aria-label="@lang('pagination.previous')">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a class="page-numbers prev" href="{{ $paginator->previousPageUrl() }}"
                       aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Numéros de page --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span class="page-numbers">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="page-numbers current">{{ $page }}</span></li>
                        @else
                            <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Lien suivant --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="page-numbers next" href="{{ $paginator->nextPageUrl() }}"
                       aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled">
                    <span class="page-numbers next" aria-label="@lang('pagination.next')">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
