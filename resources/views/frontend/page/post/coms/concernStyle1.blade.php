<div  id="concern" class="concern__style1">
	<h2 class="htitle1 mb-3">{{ $title ?? 'Nội dung liên quan' }}</h2>
	<div class="row">
		@isset($data['concern'])
		@foreach($data['concern'] as $p)
		<div class="col-md-4">
			<a href="{{ route('level1',['slug'=>$p->slug]) }}">
				<div class="item">
					<div class="thumb">
						<img data-src="{{ !empty($p->thumb300) ? $p->thumb300 : asset('img/no_img.png') }}" alt="{{ $p->title }}" class="lazyload img_cover">
					</div>
					<div class="info">
						<h3 class="webkit-box-1">{{ $p->title}}</h3>
					</div>
				</div>
			</a>
		</div>
		@endforeach
		@endif
	</div>
</div>
