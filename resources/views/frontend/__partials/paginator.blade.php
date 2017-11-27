@if ($paginator->lastPage() > 1)
    <ul>
		@if($paginator->currentPage() > 1)
        <li>
            <a  href="{{ $paginator->url($paginator->currentPage()-1) }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </li>
        @endif
         <?php $link_limit = 7; ?>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li>
                    <a  class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if($paginator->lastPage() > $paginator->currentPage())
        <li>
            <a  class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </li>
        @endif
    </ul>
@endif