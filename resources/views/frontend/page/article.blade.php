@extends("phont::frontend.layout.2col")
@section('content')
<div id="post" class="mt-3">
@isset($data['post'])
	<h1 class="font18  text-bold">
		{{$data['post']->title ?? ''}}
	</h1>
	{!!$data['meta']['content'] ?? '' !!}
	@endif
</div>
@include("phont::frontend.components.boxCommentFB")
@endsection
