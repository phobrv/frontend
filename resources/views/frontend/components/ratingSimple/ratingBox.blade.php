<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<div class="row">
	<div class="col-md-6">
		<form id="form-rating" action="{{ route('api.rating') }}" method="get">
			<input type="hidden" name="id" value="{{ $data['post']->id ?? '0' }}">
			<div id="rating-area">
				@php $rating = $data['meta']['rating'] ?? '5' ; $total = $data['meta']['ratingTotal'] ?? '1'; @endphp
				@include('phobrv::frontend.components.ratingSimple.ratingShow',['rating'=>$rating,'total'=>$total])
			</div>
		</form>
	</div>
	<div class="col-md-6 ">
		<div class="pull-right" style="display: flex;align-items: center; justify-content: flex-end;">
			<div class="fb-like" data-href="{{$fullUrlNoQuery ?? ''}}" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
		</div>
	</div>
</div>
