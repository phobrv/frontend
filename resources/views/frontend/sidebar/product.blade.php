<div class="sbox mb-3" id="sproduct">
	<div class="stitle">{{ $configs['sproduct_title'] ?? '' }}</div>
	@if( isset($configs['sproduct_number']) && isset($configs['sproduct_term_source']) )
	<ul>
		@foreach($configs['sproduct_term_source'] as $p)
		@if($loop->index < $configs['sproduct_number'])
		<li class="item">
			<div class="thumb">
				<img src="{{ !empty($p->thumb) ? $p->thumb : asset('img/no_img.png') }}" class="img_cover" alt="{{ $p->title }}">
			</div>
			<div class="meta">
				<h2>{{ $p->title }}</h2>
				<a href="{{ route('level1',['slug'=>$p->slug]) }}">
					Chi tiết
				</a>
			</div>
		</li>
		@endif
		@endforeach
	</ul>
	@endif
</div>
