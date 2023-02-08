@php 
    $created_at = date_create($p->created_at);
    $url = route('level1', ['slug' => $p->slug]);
@endphp
<div class="row boxPost4 mb-3">
    <div class="col-12 col-sm-6">
        <a href="{{$url}}">
            <div class="thumb">
                <img data-src="{{ $p->thumb }}" class="lazyload img_cover" alt="{{ $p->title }}">
            </div>
        </a>
    </div>
    <div class="col-12 col-sm-6">
        <div class="meta mt-2">
            <div class="year hidden-md-down">
                {{ date_format($created_at,"Y") }}
            </div>
            <a href="{{$url}}">
            <h2>{{ $p->title ?? '' }}</h2>
        </a>
            <div class="created_at">{{ date_format($created_at,"d/m/Y") }}</div>
            <div class="desc webkit-box-5 mb-3 " style="text-align: justify">
                {{ $p->excerpt ?? '' }}
            </div>
            <a class="btn_more" href="{{$url}}">
                Xem tiếp
            </a>
        </div>
    </div>
</div>
