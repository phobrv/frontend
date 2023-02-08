@extends("phobrv::frontend.layout.2col")
@section('content')
<div id="products-page">
	@include('phobrv::frontend.page.productgroup.layout2_short')
</div>
@endsection

@section('script')
<script type="text/javascript">
	$('.box-product2 .thumb').css('height',$('.box-product2 .thumb').width()*1)
	$('.boxProduct3 .thumb').css('height',$('.boxProduct3 .thumb').width()*1)
</script>
@endsection
