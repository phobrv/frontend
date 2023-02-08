@extends("phobrv::frontend.layout.2col")
@section('content')
<div id="post">
	<div class="page-title mb-3">
		<h1>{{ $data['post']->title ?? '' }}</h1>
	</div>
	<div class="addthis_inline_share_toolbox"></div>
	<div class="video-container">
		<iframe width="805" height="494" src="https://www.youtube.com/embed/{{ $data['post']->excerpt }}?theme=light&autohide=0&rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
</div>

<h3 class="font22 font-bold title-concern text-uppercase mt-4 pb-2 mb-3">
	Video liên quan
</h3>
<div class="row" id="concern">
	@isset($data['concern'])
	@foreach($data['concern'] as $p)
	<div class="col-md-4 @if($loop->index > 2) hidden-md-down @endif">
		@include("phobrv::frontend.page.video.coms.boxVideo1",['p'=>$p])
	</div>
	@endforeach
	@endif
</div>

@include("phobrv::frontend.components.boxCommentFB")
@endsection

@section('script')
<script type="text/javascript">
	$(function(){
		$('#concern .thumb-video').css('height',$('#concern  .thumb-video').width()*0.565);
	});
</script>
@endsection
