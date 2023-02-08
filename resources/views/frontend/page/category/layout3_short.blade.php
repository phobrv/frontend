<div class="row">
	@isset($data['meta']['category_term_paginate_source'])
	@foreach($data['meta']['category_term_paginate_source'] as $p)
	<div class="col-md-4">
		@include('phont::frontend.page.posts.coms.boxPost3',['p'=>$p])
	</div>
	@endforeach
	@endif
</div>
@if(isset($data['meta']['category_term_paginate_source']) && count($data['meta']['category_term_paginate_source']))
<div id="pagination" class="w-100 mt-3   no-margin ">
	{{$data['meta']['category_term_paginate_source']->links()}}
</div>
@endif
