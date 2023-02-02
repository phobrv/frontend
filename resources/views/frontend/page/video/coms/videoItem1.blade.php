<a class="video_item style1" href="http://www.youtube.com/watch?v={{ $p->excerpt ?? '' }}" title="{{ $p->title }}">
    <div class="thumb">
        <img data-src="{{ $p->thumb ?? '' }}" class="lazyload img_cover" alt="{{ $p->title }}">
        <div class="shade">
            @include('svg.triangle1')
        </div>
    </div>
</a>