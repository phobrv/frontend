<div class="boxProduct3">
    <div class="thumb">
        <a href="{{ route('level1', ['slug' => $p->slug]) }}">
            @include('phont::frontend.components.img',['source'=>$p->thumb ?? '','class'=>'img_cover','alt'=> $p->title ?? '','width'=>'250','height'=>'185'])
            <div class="over">
                <button>Xem chi tiết</button>
            </div>
        </a>
    </div>
    <div class="info_product">
        <div class="name  text-dark mt-1 webkit-box-2">
            <a href="{{ route('level1', ['slug' => $p->slug]) }}">
                {{ $p->title }}
            </a>
        </div>
        <div class="price mt-2 mb-2">
            <span class="new  text-red text-bold">{{ number_format($p['meta']['price'] ?? 0) }} đ</span>
            <span class="old  text-dark text-light-through">
                {{ number_format($p['meta']['price_old'] ?? 0) }}
            </span>
        </div>
        <button id="product{{ $p->id }}" class="btn_add_to_cart order_product ld-ext-right" data-id="{{ $p->id ?? '' }}">
            <span> @include('svg.cart2') Đặt hàng</span>
            <div class="ld ld-ring ld-spin"></div>
        </button>
    </div>
    
</div>
