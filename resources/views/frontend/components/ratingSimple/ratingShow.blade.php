<div class="rating">
	<div id="rating">
		@for($i=10;$i>0;$i--)
		@php
		$value = $i/2;
		$class =  ($i%2==0) ? 'full' : 'half';
		if(empty($rating))
			$id = 'star'.$i;
		else
			$id = 'starRate'.$i;
		$disabled = $checked = '';

		if(empty($rating) && $i == 10)
			$checked = 'checked';
		else if( !empty($rating) ){
			$disabled = 'disabled';
			if($i == ceil($rating*2))
				$checked = 'checked';
		}
		@endphp
		<input type="radio" id="{{ $id }}" name="rating" value="{{ $value }}"  {{ $checked }} />
		<label class = "{{ $class }}" for="{{ $id }}" title="{{ $value }}"></label>
		@endfor
	</div>
	<div>{{ $rating ?? '5' }} - {{ $total ?? '1' }} đánh giá <br>  </div>
</div>
@isset($confirm)<p id="confirm" style="color: green;"> Cảm ơn bạn đã đánh giá </p> @endif
