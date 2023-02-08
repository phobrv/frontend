<div class="row g-3">
	@isset($data['meta']['product_term_paginate_source'])
	@foreach($data['meta']['product_term_paginate_source'] as $p)
	<div class="col-md-4">
		@include("phobrv::frontend.page.productgroup.coms.boxProduct2",['p'=>$p])
	</div>
	@endforeach
	@endif
</div>
@if(isset($data['meta']['product_term_paginate_source']) && count($data['meta']['product_term_paginate_source']))
<div id="pagination" class="w-100 mt-3  no-margin ">
	{{$data['meta']['product_term_paginate_source']->links()}}
</div>
@endif
