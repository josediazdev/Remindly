@if ($paginator->hasPages())
    <div class="paginator-container">
        {{-- Enlace a la Página Anterior --}}
        @if ($paginator->onFirstPage())
            <span class="index-button prev-button">
                <small><i class="bi bi-arrow-left-short"></i>Previous</small>
            </span>
        @else
            <a class="index-button prev-button-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <small><i class="bi bi-arrow-left-short"></i>Previous</small>
            </a>
        @endif

        {{-- Enlace a la Página Siguiente --}}
        @if ($paginator->hasMorePages())
            <a class="index-button next-button-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <small>Next<i class="bi bi-arrow-right-short"></i></small>
            </a>
        @else
            <span class="index-button next-button">
                <small>Next<i class="bi bi-arrow-right-short"></i></small>
            </span>
        @endif
    </nav>
@endif
