<table  id="cart_short">
	<tr class="th">
		<th colspan="2">Sản phẩm</th>
		<th class="hidden-sm-down">Giá</th>
	</tr>
	@php $sum = 0;@endphp
	@foreach($data['cart'] as $p)
	@if($p->qty > 0)
	@php $sum += $p->price * $p->qty;@endphp
	<input type="hidden" name="price_{{$p->rowId}}" id="price_{{$p->rowId}}" value="{{$p->price}}">
	<tr class="item" id="{{$p->rowId}}">
		<td class="p-2">
			<img src="{{$p->options['img'] ?? asset('img/no_img.png')}}" width="75" >
		</td>
		<td  class="pt-3 ps-2 pe-2 pb-3 name" width="280">
			<span class="text-blue" >{{$p->name}} ({{$p->options['option'] ?? ''}})</span>
		</td>
		<td  class="hidden-sm-down" width="100">
			<span class="font15 text-bold">{{number_format($p->price)}} đ</span>
            <br> x {{$p->qty}}
		</td>
		
	</tr>
	@endif
	@endforeach
	<tr>
		<td colspan="1" class="p-3">
			<span class="font15 text-bold">Tổng tiền</span>
		</td>
		<td colspan="2">
			<span id="total" class="pull-right font18 text-bold">
				@php $sum += $data['fee_ship'];@endphp
				{{number_format($sum)}} đ
			</span>
		</td>
	</tr>
</table>
