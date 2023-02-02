<div class="modal" id="modalRequest" tabindex="-1">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Yêu cầu báo giá</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="thumb mb-3">
							<img src="{{ $product->thumb ?? '' }}" class="img_cover" alt="">
						</div>
						<h2>{{ $product->title ?? '' }}</h2>
					</div>
					<div class="col-md-8">
						<form action="{{ route('received') }}" method="post">
							@csrf
							<input type="hidden" name="url" value="{{ $fullUrl }}">
							<input type="hidden" name="type" value="requestQuote">
							<input type="hidden" name="content" value="Yêu cầu báo giá: {{ $product->title }}">
							<input type="hidden" name="success" value="Chúng tôi đã nhận được yêu cầu của bạn. Chúng tôi sẽ liên hệ trong thời gian sớm nhất. Xin cảm ơn!">
							<div class="mb-2">
								<label for="name" class="form-label">Họ và tên*</label>
								<input type="text" class="form-control" id="name" name="name" value="" required placeholder="Họ và tên*">
							</div>
							<div class="mb-2">
								<label for="phone" class="form-label">Số điện thoại*</label>
								<input type="number" class="form-control" id="phone" name="phone" value="" required placeholder="Số điện thoại*">
							</div>
							<div class="mb-2">
								<label for="add" class="form-label">Địa chỉ giao hàng</label>
								<input type="text" class="form-control" id="add" name="add" value="" placeholder="Địa chỉ giao hàng">
							</div>
							<div class="mb-2">
								<textarea class="form-control" name="note" placeholder="Nội dung yêu cầu" rows="4"></textarea>
							</div>
							<div class="text-center">
								<button class="btn-sent">Gửi yêu cầu</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>