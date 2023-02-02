@extends("phont::frontend.layout.2col")
@section('content')
<div id="cagegory_page1" class="category_main">
	<h1>{{$data['post']->title ?? ''}}</h1>
	@include("phont::frontend.page.posts.layout1_short")
</div>
@include("phont::frontend.components.boxCommentFB")
@endsection
