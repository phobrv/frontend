@extends("phobrv::frontend.layout.1col")
@section('content')
<section id="recruitments">
	<div class="container">
		<ul>
			@isset($data['posts'])
			@foreach($data['posts'] as $p)
			<li class="item wow animate__zoomIn">
				<div class="number">
					@isset($p['meta']['number']){{ $p['meta']['number'] }}@endif
				</div>
				<div class="meta">
					<h2>{{ $p->title }}</h2>
					<div class="date">Hết hạn: @isset($p['meta']['number']){{ date('d/m/Y',strtotime($p['meta']['endTime'])) }}@endif</div>
				</div>
				<div class="fillter"></div>
				<div class="readmore">
					<a  href="{{ route('level1',['slug'=>$p->slug]) }}">
						Xem chi tiết
					</a>
				</div>
			</li>
			@endforeach
			@endif
		</ul>
	</div>
</section>
@endsection
