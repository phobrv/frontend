<div class="box-product1">
	<a href="{{ route('level1',['slug'=>$p->slug]) }}">
		<div class="thumb label-subtitle">
			@include('phont::frontend.components.img',['source'=>$p->thumb ?? '','class'=>'img_cover','alt'=> $p->title ?? '','width'=>'250','height'=>'185'])
		</div>
		<div class="info">
			<h3 class="webkit-box-2 mt-2">
				{{ $p->title ?? '' }}
			</h3>
			<div class="meta">
				<div class="price">
					{{ number_format($p->price ?? 0 ,0,',','.') }}đ
				</div>
				<div class="local">
					Vị trí: Hà Nội
				</div>
			</div>
			<div class="view-detail mt-2">
				<button>
					Xem chi tiết
				</button>
			</div>
		</div>
	</a>
</div>
