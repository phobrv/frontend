<div id="concern" class="concern__style3 bg_light  mt-3">
	<div class="title font18  text-bold text-uppercase mb-3">
		Tin tức liên quan
	</div>
	<ul>
		@isset($data['concern'])
		@foreach($data['concern'] as $p)
		<li class="concern">
			<a href="{{route('level1',array('slug'=>$p->slug))}}">
				<h2 class="font16 webkit-box-2 ">
					@include('svg.arrow3') {{$p->title}}
				</h2>
			</a>
		</li>
		@endforeach
		@endif
	</ul>
</div>
