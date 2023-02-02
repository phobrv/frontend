@extends("phont::frontend.layout.1col")
@section('content')
@include("phont::frontend.layout.breadcrumb")
<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_V3_KEY') }}"></script>
<div id="contact-page3">
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-4">
                <ul class="info">
                    <li>
                        @include('svg.place2') {{$configs['company_add'] ?? ''}}
                    </li>
                    <li>
                        @include('svg.phone') {{$configs['hotline_number'] ?? ''}}
                    </li>
                    <li>
                        @include('svg.mail2') {{$configs['company_email'] ?? ''}}
                    </li>
                </ul>
                <div class="form">

                    <form id="main-contact-form" class="contact-form row" action="#" name="contact-form" method="post">
                        @csrf
                        <input type="hidden" name="type" value="contact">
                        <input type="hidden" name="messSuccess" value="Chúng tôi đã nhận được thông tin, chúng tôi sẽ liên hệ sớm nhất có thể!">
                        <div class="input mb-3">
                            <div class="title">
                                Liên hệ với chúng tôi
                            </div>
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
                        </div>
						<div class="form-group mb-2">
							<button class="btn-submit btn_received" type="submit" data-key="{{ env('GOOGLE_RECAPTCHA_V3_KEY') }}" data-form="main-contact-form">Gửi</button>
						</div>
					</form>
                </div>
            </div>
            <div class="col-md-8">
                <div id="gmap" class="contact-map">
                    @isset($data['meta']['code_googlemap'])
                    {!! $data['meta']['code_googlemap'] !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection