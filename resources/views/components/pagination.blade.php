@if ($paginator->hasPages())
   <nav>
      <ul class="pagination">
         {{-- Previous Page Link --}}
         @if ($paginator->onFirstPage())
            <li>
               <a class="page-link disabled"></a>
            </li>
         @else
            <li>
               <a class="page-link" href="{{$paginator->previousPageUrl()}}"></a>
            </li>
         @endif
         {{-- Pagination Elements --}}
         @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
               <li>
                  <span class="page-link">{{$element}}</span>
               </li>
            @endif 
            {{-- Array Of Links --}}
            @if (is_array($element))
               @foreach ($element as $page => $url)
                  @if ($page == $paginator->currentPage())
                     <li>
                        <a class="page-link active">{{$page}}</a>
                     </li>
                  @else
                     <li>
                        <a class="page-link" href="{{$url}}">{{$page}}</a>
                     </li>
                  @endif
               @endforeach
            @endif
         @endforeach
         {{-- Next Page Link --}}
         @if ($paginator->hasMorePages())
            <li>
               <a class="page-link" href="{{$paginator->nextPageUrl()}}"></a>
            </li>
         @else
            <li>
               <a class="page-link disabled"></a>
            </li>
         @endif
      </ul>
   </nav>
@endif