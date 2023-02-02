@extends("phont::frontend.layout.2col")
@section('content')
<div class="gallery_page">
	<div class="row">
		@isset($data['meta']['gallery_number'])
		@for($i=0;$i<$data['meta']['gallery_number'];$i++)
		@php
		$thumb = "gallery".$i."_thumb";
		$link = "gallery".$i."_link";
		$title = "gallery".$i."_title";
		@endphp
		<div class="col-md-4 col-xs-6">
			<a href="{{ $data['meta'][$link] }}">
				<div class="thumb">
					<img data-src="{{ $data['meta'][$thumb] ?? '' }}" alt="thumb" class="lazyload img_cover">
				</div>
				<h2>{{ $data['meta'][$title] ?? '' }}</h2>
			</a>
		</div>
		@endfor
		@endif
	</div>
	@if(!empty($data['meta']['video_term_paginate_source']))
	<div id="pagination" class="w-100 mt-3  no-margin ">
		{{$data['meta']['video_term_paginate_source']->links()}}
	</div>
	@endif

</div>
@include("phont::frontend.components.boxCommentFB")
@endsection

@section('script')
<script type="text/javascript">
	$(function(){
		$('.gallery_page .thumb').css('height',$('.gallery_page .thumb').width()*0.65);
	});
</script>
@endsection
