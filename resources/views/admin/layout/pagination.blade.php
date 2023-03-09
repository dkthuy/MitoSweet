<section class="bg-product admin">
    <div class="container">
        <div class="row justify-content-md-center">
            @if ($paginator->hasPages())
                <ul class="pagination modal-1">
                    {{-- Trang đầu --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled"><a><</a></li>
                    @else
                        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></li>
                    @endif
                    {{-- Thành phần --}}
                    @foreach ($elements as $element)
                        {{-- Dấu ... --}}
                        @if (is_string($element))
                            <li class="disabled"><a>{{ $element }}</a></li>
                        @endif

                        {{-- Mảng link --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li><a class="active">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Trang tiếp theo -->
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">></a></li>
                    @else
                        <li class="disabled"><a>></a></li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</section>

