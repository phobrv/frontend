<div class="sidebar__new sbox mb-3" >
	<div class="stitle__style1">{{ $configs['snew_title'] ?? '' }}</div>
	@if( isset($configs['snew_term_source'])  )
	<ul>
		@foreach($configs['snew_term_source'] as $p)
		<li class="item">
			<div class="thumb">
				<a href="{{ route('level1',['slug'=>$p->slug]) }}">
					<img data-src="{{ !empty($p->thumb150) ? $p->thumb150 : asset('img/no_img.png') }}" class="lazyload img_cover" alt="{{ $p->title }}">
				</a>
			</div>
			<div class="meta">
				<a href="{{ route('level1',['slug'=>$p->slug]) }}">
					<h2>{{ $p->title }}</h2>
				</a>
				<div class="date">
					@include('svg.calendar3') {{ date('d/m/Y',strtotime($p->created_at)) }}
				</div>
			</div>
		</li>
		@endforeach
	</ul>
	@endif
</div>
