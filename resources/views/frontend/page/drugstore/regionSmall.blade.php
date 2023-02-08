@extends("phobrv::frontend.layout.2col")
@section('content')
<h2 class="text-orange h2_title">

</h2>
<div id="drugstore_show">
	<div class="item">
		<div class="diemban_title">
			@include('svg.place2')  @if(isset($data['post']->title)) {{$data['post']->title}} @endif
		</div>
		<div class="list">
			@foreach($data['childs'] as $dr)
			<div class="regions">
				<a style="color: #000000;" href="{{route('level1',array('slug'=>$dr->slug))}}">
					@include('svg.place_svg') {{$dr->title}}<br>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
@include("phobrv::frontend.components.boxCommentFB")
@endsection
