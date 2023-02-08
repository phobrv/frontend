<div class="box-product2 z-depth-2 item_hover_effect">
	<div class="thumb">
		<a href="{{route('level1',['slug'=>$p->slug])}}">
			<img data-src="{{!empty($p->thumb) ? $p->thumb : asset('img/no_img.png')}}" class="lazyload img_cover" alt="{{$p->title}}">
			<div class="over">
                <button>Xem chi tiết</button>
            </div>
		</a>
	</div>
	<div class="info_product">
		<div class="name font12 mt-1">
			<a class="webkit-box-2" href="{{route('level1',['slug'=>$p->slug])}}">{{$p->title ?? ''}}</a>
		</div>
		<div class="price mt-2 mb-2">
			<span class="new font13 text-red text-bold">{{ number_format($p['meta']['price'] ?? 0 ,0,',','.') }}đ</span>
			<span class="new font13 text-dark text-light-through pull-right">{{ number_format($p['meta']['price_old'] ?? 0 ,0,',','.') }}đ</span>
		</div>
		<button id="product{{$p->id}}" class="btn_add_to_cart ld-ext-right" data-id="{{ $p->id ?? '' }}">
			<span>@include('svg.cart') Đặt hàng</span>
			<div class="ld ld-ring ld-spin"></div>
		</button>
	</div>
</div>
