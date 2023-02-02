@extends("phont::frontend.layout.2col")
@section('content')
<div class="service_content detail_content drug_page">
	@isset($data['post']){!!$data['post']->content!!}@endif
</div>

@include("phont::frontend.components.boxCommentFB")
@endsection
