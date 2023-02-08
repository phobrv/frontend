@extends("phobrv::frontend.layout.2col")
@section('content')
<div id="post">
	<h1>{{ $data['post']->title ?? '' }}</h1>
	@include('phobrv::frontend.components.ratingSimple.ratingBox')

	@include('phobrv::frontend.page.post.coms.mainContent')
	{!! $data['post']->content !!}
</div>

@include("phobrv::frontend.page.post.coms.boxTags")
@include("phobrv::frontend.page.post.coms.boxConcern")
@include("phobrv::frontend.components.boxCommentFB")

@endsection
@section('script')
<script type="text/javascript">
	$(function(){
		$('#concern .thumb').css('height',$('#concern  .thumb').width()*0.625);
	});
</script>
@endsection
