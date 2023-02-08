<div class="boxPost3 wow animate__zoomIn item_hover_effect">
	<div class="thumb">
		<a href="{{ route('level1',['slug'=>$p->slug]) }}">
			<img data-src="{{ !empty($p->thumb) ? $p->thumb : asset('img/no_img.png') }}" class="lazyload img_cover" alt="{{ $p->title }}">
		</a>
	</div>
	<div class="meta">
		<a href="{{ route('level1',['slug'=>$p->slug]) }}">
			<h2 class="webkit-box-2">{{ $p->title }}</h2>
		</a>
		<div class="date">
			<i class="fal fa-clock"></i> {{ date('d/m/Y',strtotime($p->created_at)) }}
		</div>
		<p class="webkit-box-2">{{ $p->excerpt }}</p>
		<hr>
		<a class="readmore" href="{{ route('level1',['slug'=>$p->slug]) }}">
			Chi tiết <i class="far fa-long-arrow-right"></i>
		</a>
	</div>

</div>
