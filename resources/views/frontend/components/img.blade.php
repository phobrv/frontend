@php
    $src = 'rs'. ((!empty($src)) ? $src : '3') . '00';
    $data_src = "data-src='".str_replace('photos', $src , $source)."'" ;
    $srcset = (!empty($srcset)) ? $srcset : [2,3,4,5,6,8];
    $data_srcset = "";
    foreach($srcset as $set){
        $data_srcset .= str_replace('photos', 'rs'.$set.'00' , $source).' '.$set.'00w ,';
    }
    $data_srcset = "data-srcset='".substr($data_srcset,0,-1)."'";
@endphp
<img data-sizes="auto" {!!$data_src!!} {!!$data_srcset!!} class="lazyload {{$class ?? ''}}" />