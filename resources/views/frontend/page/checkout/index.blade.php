@extends("phont::frontend.layout.1col")
@section('content')
<div id="checkout-page" class="mt-3 mb-3">

	<div class="container">
		<button id="cart">
			Count: <span id="cart_count">0</span>
		</button>
		<div class="lable_checkout mb-5">
			<ul>
				<li class="active">Đặt hàng</li>
				<li>></li>
				<li>Hoàn tất</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div id="cart_table">
					@include('phont::frontend.page.checkout.table')
				</div>
			</div>
			<div class="col-md-5">
				<form id="checkout_form" autocomplete="off">
					<div class="info ">
						<div class="title font18 text-bold text-uppercase text_dark mb-3">
							Thông tin thanh toán
						</div>
						<div class="form-group mb-2">
							<input class="form-control" type="text" name="name" placeholder="Họ và tên*" required>
						</div>
						<div class="form-group mb-2">
							<input class="form-control" type="number" name="phone" placeholder="Số điện thoại*"  required>
						</div>
						<div class="form-group mb-2">
							<input class="form-control" type="text" name="add" placeholder="Địa chỉ">
						</div>
						<label class="mb-2">Ghi chú (không bắt buộc)</label>
						<div class="form-group  mb-2">
							<textarea class="form-control" rows="3" name="note" ></textarea>
						</div>
						<div class="pay" class="mt-2 mb-2">
							<div class="title font18 text-blue text-bold mb-3">Phương thức thanh toán</div>
							<ul id="payment_method">
								<li>
									<input type="radio" name="pay_method" value="cod" checked  data-bs-target="#pm_cod_desc" data-bs-toggle="collapse"> Thanh toán khi nhận hàng
									<div id="pm_cod_desc" class="collapse" >
										<p>Thanh toán khi nhận hàng - COD</p>
									</div>
								</li>
								<li>
									<input type="radio" name="pay_method" value="pm_gwnl"  data-bs-target="#pm_gwnl_desc" data-bs-toggle="collapse" >  Thanh toán trực tuyến
									<div id="pm_gwnl_desc" class="collapse" >
										<p>Thực hiện thanh toán bằng tài khoản ngân hàng trực tuyến, thẻ ATM, VisaCard, MasterCard qua cổng Ngân Lượng</p>
									</div>

								</li>
							</ul>
						</div>
						<div class="form-footer">
							<button class="btn_order" type="submit" id="checkoutBtn"> Đặt hàng</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
