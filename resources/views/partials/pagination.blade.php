@if ($paginator->hasPages())
    <nav class="luxury-pagination" role="navigation" aria-label="Navigation des pages">
        {{-- Bouton Précédent --}}
        @if ($paginator->onFirstPage())
            <span class="page-link disabled" aria-disabled="true" aria-label="Page précédente">
                <i class="fa-solid fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" aria-label="Page précédente">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        @endif

        {{-- Éléments de pagination --}}
        @foreach ($elements as $element)
            {{-- Séparateur "..." --}}
            @if (is_string($element))
                <span class="page-link dots" aria-disabled="true">{{ $element }}</span>
            @endif

            {{-- Liens de pages --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-link active" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Bouton Suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="Page suivante">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        @else
            <span class="page-link disabled" aria-disabled="true" aria-label="Page suivante">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
        @endif
    </nav>
@endif
