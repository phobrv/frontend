@extends("phobrv::frontend.layout.2col")
@section('content')
<div class="service_content detail_content drug_page">
	@isset($data['post']){!!$data['post']->content!!}@endif
</div>

@include("phobrv::frontend.components.boxCommentFB")
@endsection
