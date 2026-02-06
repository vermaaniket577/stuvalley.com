@if ($paginator->hasPages())
    <nav class="pg-container" role="navigation">
        <div class="pg-flex">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="pg-item pg-disabled"><i class="fas fa-chevron-left"></i></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pg-item pg-link" rel="prev"><i
                        class="fas fa-chevron-left"></i></a>
            @endif

            {{-- Pagination Elements --}}
            <div class="pg-numbers">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="pg-item pg-disabled">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="pg-item pg-active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="pg-item pg-link">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pg-item pg-link" rel="next"><i
                        class="fas fa-chevron-right"></i></a>
            @else
                <span class="pg-item pg-disabled"><i class="fas fa-chevron-right"></i></span>
            @endif
        </div>
    </nav>

    <style>
        .pg-container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .pg-flex {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pg-numbers {
            display: flex;
            gap: 8px;
        }

        .pg-item {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #1e293b;
        }

        .pg-link:hover {
            border-color: #2563eb;
            color: #2563eb;
            background: #f8fafc;
            transform: translateY(-2px);
        }

        .pg-active {
            background: #2563eb;
            color: #fff;
            border-color: #2563eb;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        .pg-disabled {
            opacity: 0.4;
            background: #f1f5f9;
            cursor: not-allowed;
        }

        @media (max-width: 600px) {
            .pg-numbers {
                display: none;
                /* Hide numbers on small mobile for space */
            }
        }
    </style>
@endif