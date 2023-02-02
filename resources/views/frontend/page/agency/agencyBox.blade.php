<ul id="list" >
	@if(isset($data['agencies']) && count($data['agencies']))
	@foreach($data['agencies'] as $p)
	<li class="item" onclick="showMap('{{ $p->content }}',this)">
		<div class="name">@include('svg.place_svg') {{ $p->title }}</div>
		<div class="address">{{ $p->excerpt }}</div>
		<div class="phone">{{ $p->thumb }}</div>
		<div>Get Directions</div>
	</li>
	@endforeach
	@else
	<p>Không có dữ liệu đại lý</p>
	@endif

</ul>
<div id="map">
	{!! $data['agencyCur']['content'] ?? '<p>Không có dữ liệu đại lý</p>' !!}
</div>
