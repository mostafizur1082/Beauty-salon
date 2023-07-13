@if ($paginator->hasPages())

<ul class="pagination">

	 @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    	<span aria-hidden="true">
                    	<i class="fa fa-angle-double-left"></i></span>
                    </a>
                </li>
            @endif

	{{-- <li>
		<a href="#" aria-label="Previous">
			<span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
		</a>
	</li> --}}

	@foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page">
                            	<a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

	{{-- <li class="active"><a href="#">1</a></li> --}}
	{{-- <li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li> --}}

	@if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-double-right"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    {{-- <a href="#" aria-label="Next"> --}}
				<span aria-hidden="true">
					<i class="fa fa-angle-double-right"></i>
				</span>
				{{-- </a> --}}
                </li>
            @endif
	{{-- <li>
								
	<a href="#" aria-label="Next">
	<span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
	</a>
	</li> --}}
</ul>

@endif

						