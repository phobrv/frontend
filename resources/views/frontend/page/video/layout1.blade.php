@extends("phobrv::frontend.layout.2col")
@section('content')
<div class="category_main">
	@include("phobrv::frontend.page.video.layout1_short")
</div>
@include("phobrv::frontend.components.boxCommentFB")
@endsection

@section('script')
<script type="text/javascript">
	$(function(){
		$('.thumb-video').css('height',$('.thumb-video').width()*0.565);
	});
</script>
@endsection
