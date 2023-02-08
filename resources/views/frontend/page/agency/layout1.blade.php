@extends("phobrv::frontend.layout.1col")
@section('content')
<div id="agency-page">
	<div class="container">
		<div class="text-center mb-3">
			<h1>Danh sách đại lý</h1>
		</div>
		<form id="search-agency" action="{{ $fullUrlNoQuery }}" method="get" class="mb-3">
			<div class="form-group row">
				<div class="label col-md-2" for="term_id">Tìm kiếm đại lý</div>
				<div class="col-md-3">
					<select id="term_id" name="term_id" class="form-control" id="region">
						<option value="0">Chọn Tỉnh/Thành phố</option>
						@if(!empty($data['provinces']))
						@foreach($data['provinces'] as $r)
						<option value="{{ $r->id }}">{{ $r->name }}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>
		</form>
		<div id="agencyBox">
			@include('phobrv::frontend.page.agency.agencyBox')
		</div>
	</div>
</div>

@endsection
@section('script')
<script>
	function showMap(map,obj) {
		$('#list .active').removeClass('active')
		$(obj).addClass('active')
		$('#map').html('')
		$('#map').html(map)
	}
	$('select#term_id').on('change', function() {
		var form = $("#search-agency");
		var url = form.attr('action')
		var data = form.serialize()
		$.ajax({
			headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: url,
			data: data,
			type: "get",
			success: function(out)
			{
				console.log(out)
				$('#agencyBox').html('')
				$('#agencyBox').html(out)
			}
		});
	});
</script>
@endsection
