<?php
$ran1 = rand(1,9);
$ran2 = rand(1,9);
$total = $ran1+$ran2; 
?>
<div class="form-group">
	<input type="hidden" value="{{$total}}" name="inputValidator">
	<span>Thực hiện phép tính (bắt buộc): {{$ran1}} + {{$ran2}}  =</span> <input name="inputEnter" style="width: 60px;" type="number" name="tmp" min="{{$total}}" max="{{$total}}" required>
</div>
