@extends("phont::frontend.layout.2col")
@section('content')
<div class="album_page">
	<h2>{{ $data['post']->title ?? '' }}</h2>
	<div class="list popup-gallery">
		<div class="row">
			@isset($data['meta']['album_term_source'])
			@foreach($data['meta']['album_term_source'] as $p)
			<div class="col-md-4">
				<div class="thumb">
					<a href="{{ !empty($p->thumb) ? $p->thumb : asset('img/no_img.png') }}">
						<img data-src="{{ !empty($p->thumb) ? $p->thumb : asset('img/no_img.png') }}" alt="{{ $p->title }}" class="lazyload img_cover">
					</a>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
@include("phont::frontend.components.boxCommentFB")
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
			preload: [0,1]
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
	});
	$(function(){
		$('.thumb').css('height',$('.thumb').width()*0.65);
	});

</script>
@endsection
