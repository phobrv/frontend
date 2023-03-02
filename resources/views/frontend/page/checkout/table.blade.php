<i>Free ship khi đơn hàng > {{number_format($data['freeShipCondition'])}} đ</i>
<table class="cart">
	<tr class="th">
		<th colspan="3">Sản phẩm</th>
		<th class="hidden-sm-down">Giá</th>
		<th class="text-center">Số lượng</th>
		<th  class="hidden-sm-down">Tổng cộng</th>
	</tr>
	@php $sum = 0;@endphp
	@foreach($data['cart'] as $p)
	@if($p->qty > 0)
	@php $sum += $p->price * $p->qty;@endphp
	<input type="hidden" name="price_{{$p->rowId}}" id="price_{{$p->rowId}}" value="{{$p->price}}">
	<tr class="item" id="{{$p->rowId}}">
		<td>
			<button data-rowid="{{$p->rowId}}" class="cart__remove" title="Remove">
				@include('svg.trash')
			</button>
		</td>
		<td class="p-2">
			<img src="{{$p->options['img'] ?? asset('img/no_img.png')}}" width="75" >
		</td>
		<td  class="pt-3 ps-2 pe-2 pb-3 name" >
			<span class="text-blue" >{{$p->name}}  ({{$p->options['option'] ?? ''}})</span>
		</td>
		<td  class="hidden-sm-down">
			<span class="font18 text-bold">{{number_format($p->price)}} đ</span>
		</td>
		<td class="text-center count p-3">
			<button class="btn_change_cart_item btn_minus" data-rowid="{{$p->rowId}}" data-type="minus" >
				-
			</button>
			<input  class="qty" id="qty_{{$p->rowId}}" type="text" name="qty" value="{{$p->qty}}" min="1" readonly>
			<button class="btn_change_cart_item btn_plus"  data-rowid="{{$p->rowId}}" data-type="plus" >
				+
			</button>
		</td>
		<td align="center"  class="hidden-sm-down">
			<span class="font18 text-bold pull-right" id="total_{{$p->rowId}}">{{number_format($p->price*$p->qty)}} đ</span>
		</td>
	</tr>
	@endif
	@endforeach
	<tr class="item ">
		<td colspan="2" class="p-3">
			<span class="text-bold">Giao hàng </span>
		</td>
		<td colspan="2" class="hidden-sm-down"></td>
		<td colspan="2">
			<input type="hidden" name="fee_ship" id="fee_ship" value="{{$data['fee_ship']}}">
			@if($data['fee_ship'] == 0)
			<div id="free_ship">
				Free ship khi đơn hàng từ {{number_format($data['freeShipCondition'])}} đ trở lên
			</div>
			@else
			<div id="have_ship" class="ship pull-right text-bold">
				{{number_format($data['fee_ship'])}} đ
			</div>
			@endif
		</td>
	</tr>
	<tr>
		<td colspan="2" class="p-3">
			<span class="font18 text-bold">Tổng tiền</span>
		</td>
		<td colspan="2"  class="hidden-sm-down"></td>
		<td colspan="2">
			<span id="total" class="pull-right font18 text-bold">
				@php $sum += $data['fee_ship'];@endphp
				{{number_format($sum)}} đ
			</span>
		</td>
	</tr>
</table>
