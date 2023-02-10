@extends("phont::frontend.layout.1col")
@section('content')
@include("phont::frontend.layout.breadcrumb")
<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_V3_KEY') }}"></script>

<section id="contact-page2">
	<div class="container">
		<div class="row">
			<div class="col-md-6 wow animate__backInLeft">
				<h1 class="mb-2">{{ $configs['company_name'] ?? '' }}</h1>
				<h2 class="mb-3">{!! $configs['company_add'] ?? '' !!}</h2>
				<ul class="meta">
					<li>@include('svg.phone_ring_svg') {{ $configs['hotline_number'] ?? '' }}</li>
					<li>@include('svg.phone1') {{ $configs['company_phone'] ?? '' }}</li>
					<li>@include('svg.fax') {{ $configs['company_fax'] ?? '' }}</li>
					<li>@include('svg.mail1') {{ $configs['company_email'] ?? '' }}</li>
				</ul>
			</div>
			<div class="col-md-6 wow animate__backInRight">
				<div class="right">
					<h3 class="mb-3">Liên hệ qua email</h3>
					<form id="main-contact-form" class="contact-form row" action="#" name="contact-form" method="post">
						@csrf
						<input type="hidden" name="type" value="contact">
						<input type="hidden" name="messSuccess" value="Chúng tôi đã nhận được thông tin, chúng tôi sẽ liên hệ sớm nhất có thể!">
						<div class="form-group mb-2">
							<input type="text" name="name" class="form-control" placeholder="Họ và tên*" required>
						</div>
						<div class="form-group mb-2">
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group mb-2">
							<input type="number" name="phone" class="form-control" placeholder="Số điện thoại*" required>
						</div>
						<div class="form-group mb-2">
							<textarea class="form-control" name="content" placeholder="Nội dung" rows="3"></textarea>
						</div>
						<div class="form-group mb-2">
							<button class="btn-submit btn_received" type="submit" data-key="{{ env('GOOGLE_RECAPTCHA_V3_KEY') }}" data-form="main-contact-form">Gửi</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-12 mt-4 wow animate__zoomIn">
				<h3>Bản đồ công ty</h3>
				<div id="gmap" class="contact-map">
					@isset($data['meta']['code_googlemap'])
					{!! $data['meta']['code_googlemap'] !!}
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
