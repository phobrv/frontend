@extends("phont::frontend.layout.1col")
@section('content')
<div class="container">
	<div id="cagegory_page3" class="category_main mt-3">
		<h1>{{$data['post']->title ?? ''}}</h1>

		@include("phont::frontend.page.category.layout3_short")
	</div>
</div>
@include("phont::frontend.components.boxCommentFB")
@endsection
@section("script")
<script>
	$('.boxPost3 .thumb').css('height',$('.boxPost3 .thumb').width()*0.65)
</script>
@endsection