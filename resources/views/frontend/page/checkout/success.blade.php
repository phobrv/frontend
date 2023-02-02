@extends("phont::frontend.layout.1col")
@section('content')
<div id="checkout-success" class="mt-3 mb-5">
	<div class="container">
		<div class="lable_checkout mb-5">
			<ul>
				<li >Đặt hàng</li>
				<li class="active">></li>
				<li class="active">
					@if($data->status == -1)
					Huỷ đơn hàng
					@else
					Hoàn tất
					@endif
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="title font30 text-bold mt-2 mb-2">
					Chi tiết đơn hàng
				</div>
				<table class="detail">
					<tr class="th font18 text-uppercase text_dark">
						<th>Sản phẩm</th>
						<th class="pull-right">Tổng cộng</th>
					</tr>
					@foreach($data['cart'] as $p)
					<tr>
						<td><span class="text-blue font17">{{$p->name}}</span> <span class="font17 text-bold">x{{$p->qty}}</span></td>
						<td class="pull-right font18 text-bold">{{number_format($p->price*$p->qty)}} đ</td>
					</tr>
					@endforeach

					<tr>
						<td class="font17 text_dark">Phí vận chuyển: </td>
						<td class="pull-right font18 text_dark">
							@if(!empty($data['meta']['fee_ship']))
							{{number_format($data['meta']['fee_ship'] ?? 0)}} đ
							@else
							Miễn phí ship
							@endif
						</td>
					</tr>
					<tr>
						<td class="font17 text_dark">Tổng cộng:</td>
						<td class="pull-right font18 text-bold">{{number_format($data['meta']['price'] ?? 0)}} đ</td>
					</tr>
					<tr>
						<td class="font17 text_dark">Phương thức thanh toán</td>
						<td class="pull-right font18 text_dark">{{$data['meta']['pay_method_label'] ?? '' }}</td>
					</tr>
					<tr>
						<td>Note:</td>
						<td class="pull-right  font18 text_dark">
							{{ $data['note'] ?? '' }}
						</td>
					</tr>

				</table>
			</div>
			<div class="col-md-5">
				<div class="box_thank ">
					<div class="title font20 text_green mb-2">
						@if($data->status == -1)
						Huỷ đơn hàng thành công.
						@else
						Cảm ơn bạn. Đơn hàng của bạn đã được tiếp nhận
						@endif
					</div>
					<div class="content">
						<ul class="info">
							<li>Mã đơn hàng : {{'WEB_'.$data['id']}}</li>
							<li>Ngày: {{date('m-d-Y')}}</li>
							<li>Tổng cộng: <span class="text-bold">{{number_format($data['meta']['price'])}} đ</span></li>
							<li>Phương thức thanh toán: {{$data['meta']['pay_method_label'] ?? ''}}</li>
						</ul>
						<ul class="future">
							<li class="team">@include('svg.help') Đội ngũ chăm sóc khách hàng sẽ gọi điện xác nhận đơn hàng</li>
							<li class="tranform">
								@include('svg.delivery_free') Chúng tôi sẽ vận chuyển hàng đến địa chỉ khách hàng
							</li>
							<li class="pay">
								@include('svg.money') Chúng tôi sẽ nhận tiền và thối tiền (nếu có) trực tiếp từ khách hàng
							</li>

						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
