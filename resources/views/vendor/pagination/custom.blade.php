@if ($paginator->hasPages())
    <nav>
        <ul class="c-pagination">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if($page == 1 && $page != $paginator->currentPage())
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->currentPage())
                            <li class="c-pagination__active" aria-current="page"><span>{{ $page }}</span></li>
                        @elseif($paginator->currentPage() - 3 < $page && $page < $paginator->currentPage() + 3)
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage())
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->currentPage() - 3 || $page == $paginator->currentPage() + 3)
                            <li>...</li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
