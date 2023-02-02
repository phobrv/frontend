<div id="startInput">
    @for($i=10;$i>0;$i--)
    @php
    $value = $i/2;
    $class =  ($i%2==0) ? 'full' : 'half';
    if(empty($rating))
        $id = 'star'.$i;
    else
        $id = 'starRate'.$i;
    $disabled = $disabled ?? '';
    $checked = '';

    if(empty($rating) && $i == 10)
        $checked = 'checked';
    else if( !empty($rating) ){
        if($i == ceil($rating*2))
            $checked = 'checked';
    }
    @endphp
    <input type="radio" id="{{ $id }}" name="rating" value="{{ $value }}" {{$disabled}}  {{ $checked }} />
    <label class = "{{ $class }}" for="{{ $id }}" title="{{ $value }}"></label>
    @endfor
</div>