@php 
    $rs100 = str_replace("photos","rs100",$source);
    $rs200 = str_replace("photos","rs200",$source);
    $rs300 = str_replace("photos","rs300",$source);
    $rs400 = str_replace("photos","rs400",$source);
    $rs500 = str_replace("photos","rs500",$source);
    $rs600 = str_replace("photos","rs600",$source);
    $rs800 = str_replace("photos","rs800",$source);
@endphp
<img class="responsively-lazy" src="{{$rs100}}"
   data-srcset="{{$rs200}} 200w, {{$rs300}} 300w, {{$rs400}} 400w, {{$rs500}} 500w, {{$rs600}} 600w, {{$rs800}} 800w"
   srcset="{{$rs100}}" />
