@extends("phobrv::frontend.layout.2col")
@section('content')
<h2 class="font20 text-main text-uppercase font-bold">
	@if(isset($data['post']->title)) {{$data['post']->title}} @endif
</h2>
<div id="drugstore_show">
	@foreach($data['region'] as $ad)
	<div class="item">
		<div class="diemban_title">@include('svg.place2') {{$ad->name}}</div>
		<div class="list">
			@foreach($ad->posts as $dr)
			<div class="regions">
				<a style="color: #000000;" href="{{route('level1',array('slug'=>$dr->slug))}}">
					@include('svg.place_svg') {{$dr->title}}<br>
				</a>
			</div>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@include("phobrv::frontend.components.boxCommentFB")
@endsection
