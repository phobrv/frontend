<table style="border-spacing: 0px;margin-top: 10px;">
	<thead>
		<tr style="background-color: #4CAF50;padding: 8px;">
			<th style="padding:6px 8px; color: white;">Product</th>
			<th style="padding:6px 8px; color: white;">Price</th>
			<th style="padding:6px 8px; color: white;">Number</th>
			<th style="padding:6px 8px; color: white;">Sum</th>
		</tr>
	</thead>
	<tbody>
		@php $sum = 0; @endphp
		@foreach ($data['cart'] as $p)
		@php $sum += $p->price * $p->qty;@endphp
		<tr style="border:1px solid #FAFAFA;padding: 8px;">
			<td  style="padding:6px; border:1px solid #FAFAFA;">{{ $p->name ?? '' }}</td>
			<td style="padding:6px; border:1px solid #FAFAFA;">
				{{ number_format($p->price,0,',','.' ) ?? '' }}đ
			</td>
			<td style="padding:6px; border:1px solid #FAFAFA;">
				{{ $p->qty ?? 0 }}
			</td>
			<td style="padding:6px; border:1px solid #FAFAFA;">
				{{ number_format($p->price * $p->qty,0,',','.') ?? '' }}đ
			</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="3"  style="padding:6px; border:1px solid #FAFAFA;">Fee ship:</td>
			<td  style="padding:6px; border:1px solid #FAFAFA;">
				{{ $data['fee_ship'] ? number_format($data['fee_ship'],0,',','.') : '0' }}đ
			</td>
		</tr><tr>
			<td colspan="3"  style="padding:6px; border:1px solid #FAFAFA;">Tổng cộng:</td>
			<td  style="padding:6px; border:1px solid #FAFAFA;">
				@php $sum += $data['fee_ship'];@endphp
				{{ $sum ? number_format($sum,0,',','.') : '0' }}đ
			</td>
		</tr>
	</tbody>
</table>
