<a href="{{ route('level1',['slug'=>$p->slug]) }}">
	<div class="boxVideoShort">
		<div class="thumb-video">
			<img data-src="{{$p->thumb ?? asset('img/no_img.png')}}" class="lazyload img_cover" alt="{{$p->title}}">
			<div class="icon">
				@include('svg.triangle1')
			</div>
		</div>
		<h2 class="mt-2 webkit-box-2">{{ $p->title ?? '' }}</h2>
	</div>
</a>
