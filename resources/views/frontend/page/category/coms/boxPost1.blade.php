<div class="boxPost1 pb-3">
	<div class="row">
		<div class="col-md-8">
			<a href="{{route('level1',['slug'=>$p->slug])}}">
				<div class="thumb">
					<img data-src="{{ !empty($p->thumb) ? $p->thumb : asset('img/no_img.png') }}" class="lazyload img_cover" alt="{{$p->title}}">
				</div>
			</a>
		</div>
		<div class="col-md-4">
			<a href="{{route('level1',['slug'=>$p->slug])}}"  class="">
				<h2 class="mt-2 font18 text-bold text-yellow mb-2 webkit-box-4">
					{{$p->title}}
				</h2>
			</a>
			<p class="webkit-box-4 font16">
				{{$p->excerpt}}
			</p>
			<a href="{{route('level1',['slug'=>$p->slug])}}" class="btn_readmore">
				Tìm hiểu thêm <i class="fas fa-angle-double-right"></i>
			</a>
		</div>
	</div>
</div>