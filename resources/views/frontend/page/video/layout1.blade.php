@extends("phont::frontend.layout.2col")
@section('content')
<div class="category_main">
	@include("phont::frontend.page.video.layout1_short")
</div>
@include("phont::frontend.components.boxCommentFB")
@endsection

@section('script')
<script type="text/javascript">
	$(function(){
		$('.thumb-video').css('height',$('.thumb-video').width()*0.565);
	});
</script>
@endsection
