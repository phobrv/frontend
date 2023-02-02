@extends("phont::frontend.layout.1col")
@section('content')
@include("phont::frontend.layout.breadcrumb")
<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_V3_KEY') }}"></script>
<div id="contact-page">
	<div class="container">
		<div class="bg">
			<div class="row">
				<div class="col-sm-12">    <br>
					<h2 class="title text-center text-uppercase mb-3 text-green">Liên hệ Với chúng tôi</h2>
					<div id="gmap" class="contact-map">
						@isset($data['meta']['code_googlemap'])
						{!! $data['meta']['code_googlemap'] !!}
						@endif
					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-sm-7">
					<div class="contact-form">
						<h2 class="title font20 text-uppercase text-center mb-3">Gửi thông tin liên hệ</h2>
						<div class="status alert alert-success" style="display: none"></div>
						<form id="main-contact-form" class="contact-form row" action="#" name="contact-form" method="post">
							@csrf
							<input type="hidden" name="type" value="contact">
							<input type="hidden" name="messSuccess" value="Chúng tôi đã nhận được thông tin, chúng tôi sẽ liên hệ sớm nhất có thể!">
							<div class="form-group col-md-6 mb-3">
								<input type="text" name="name" class="form-control" required="required" placeholder="Họ tên*">
							</div>
							<div class="form-group col-md-6 mb-3">
								<input type="number" name="phone" class="form-control" required="required" placeholder="Số điện thoại*">
							</div>
							<div class="form-group col-md-12 mb-3">
								<input type="text" name="title" class="form-control" required="required" placeholder="Tiêu đề">
							</div>
							<div class="form-group col-md-12 mb-3">
								<textarea name="content" id="message" required="required" class="form-control" rows="5" placeholder="Nội dung"></textarea>
							</div>
							<div class="form-group col-md-12 text-center">
								<button class="btn-submit text-uppercase font-bold btn_received"  data-key="{{ env('GOOGLE_RECAPTCHA_V3_KEY') }}" data-form="main-contact-form">Gửi tin nhắn</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="contact-info">
						<h2 class="title font20 text-uppercase  text-center mb-3">Thông tin liên hê</h2>
						<address>
							<p class="text-bold">@if(!empty($configs['company_name'])){{$configs['company_name']}}@endif</p>
							<p>@if(!empty($configs['company1_add'])) @include('svg.place2') {!! $configs['company1_add'] !!}@endif</p>
							<p>@if(!empty($configs['company2_add'])) @include('svg.place2') {!! $configs['company2_add'] !!}@endif</p>
							<p>@if(!empty($configs['company3_add'])) @include('svg.place2') {!! $configs['company3_add'] !!}@endif</p>
							<p>@if(!empty($configs['company_phone']))Mobile: {{$configs['company_phone']}}@endif</p>
							<p>@if(!empty($configs['company_email']))Email: {{$configs['company_email']}}@endif</p>
						</address>
						<div class="social-networks">
							<h2 class="title text-center text-uppercase font20 mb-3">Mạng xã hội</h2>
							<ul>
								<li>
									<a href="@isset($configs['company_fb']){{$configs['company_fb']}}@endif" target="_blank">
										@include('svg.facebook')
									</a>
								</li>
								<li>
									<a href="@isset($configs['company_twitter']){{$configs['company_twitter']}}@endif" target="_blank">
										@include('svg.twitter-simple')
									</a>
								</li>
								<li>
									<a href="@isset($configs['company_youtube']){{$configs['company_youtube']}}@endif" target="_blank">
										@include('svg.youtube-svg')
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
