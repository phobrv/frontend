<div class="row">
	@isset($data['meta']['video_term_paginate_source'])
	@foreach($data['meta']['video_term_paginate_source'] as $p)
	<div class="col-xs-6 col-md-4">
		@include("phont::frontend.page.video.coms.videoItem1",['p'=>$p])
	</div>
	@endforeach
	@endif
</div>
@if(!empty($data['meta']['video_term_paginate_source']))
<div id="pagination" class="w-100 mt-3  no-margin ">
	{{$data['meta']['video_term_paginate_source']->links()}}
</div>
@endif
