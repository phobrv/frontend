@extends("phobrv::frontend.layout.2col")
@section('content')
<div id="category_page">
	@isset($data['posts'])
	@foreach($data['posts'] as $p)
	<div class="post w-100 mt-3 pb-3">
		<div class="thumb">
			<a href="{{route('level1',array('slug'=>$p->slug))}}" title="{{$p->title}}">
				<img data-src="{{Storage::url($p->thumb)}}" title="{{$p->title}}" class="lazyload img_cover">
			</a>
		</div>
		<a href="{{route('level1',array('slug'=>$p->slug))}}" title="{{$p->title}}">
			<h2 class="font16 text-blue text-bold webkit-box-2">
				{{$p->title}}
			</h2>
		</a>
		<div class="date_create pb-2">
			Ngày đăng: {{date('F,d Y',strtotime($p->created_at))}}
		</div>
		<p class="webkit-box-3">
			{{$p->excerpt}}
		</p>
	</div>
	@endforeach
	@endif
	@isset($data['meta']['category_term_paginate_source'])
	<div id="pagination" class="w-100 mt-3   no-margin ">
		{{$data['meta']['category_term_paginate_source']->links()}}
	</div>
	@endif
</div>
@include("phobrv::frontend.components.box_comment_fb")
@endsection
