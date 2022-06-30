<ul class="pagination pagination-rounded">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled" id="basic-datatable_previous">
            <a href="#" aria-controls="basic-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i
                    class="mdi mdi-chevron-left"></i></a>
        </li>
    @else
        <li class="paginate_button  page-item previous"><a class="page-link"
                href="{{ $paginator->previousPageUrl() }}" rel="prev"> <i
                class="mdi mdi-chevron-left"></i> </a></li>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="paginate_button page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="paginate_button page-item active"><span class="page-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="paginate_button page-item"><a class="page-link"
                            href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li class=" paginate_button page-item next"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                rel="next"><i
                class="mdi mdi-chevron-right"></i> </a></li>
    @else
        <li class=" paginate_button page-item next disabled"><a href="#"
            aria-controls="basic-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i
                class="mdi mdi-chevron-right"></i></a></li>
    @endif

</ul>
