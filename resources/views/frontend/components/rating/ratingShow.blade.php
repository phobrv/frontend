<div class="ratingShow">
    @php $active = 'active'; @endphp
    @for($i=1;$i<6;$i++)
    @php
    if( !empty($rating) ){
        if($i > $rating)
            $active = '';
    }
    @endphp
    <label class = "full {{$active}}"  title="{{ $i }}"></label>
    @endfor
</div>