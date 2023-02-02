<h2>Xin chào {{ $data['name'] ?? '' }}</h2>
<p>Đơn hàng của bạn đã đươc xử lý thành công.</p>
<p>{{ $data['pay'] ?? '' }}</p>
{!! $data['cartTable'] !!}
<h3>Thông tin đặt hàng</h3>
<p>{{ $data['name'] ?? '' }}</p>
<p>Phone: {{ $data['phone'] ?? '' }}</p>
<p>Địa chỉ: {{ $data['add'] ?? '' }}</p>
<p>Cảm ơn vì đã đặt hàng!</p>