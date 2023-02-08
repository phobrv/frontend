@extends("phobrv::frontend.layout.2col")
@section('content')
<div id="cagegory_page1" class="category_main">
	<h1>{{$data['post']->title ?? ''}}</h1>
	@include("phobrv::frontend.page.category.layout1_short")
</div>
@include("phobrv::frontend.components.boxCommentFB")
@endsection
