<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_V3_KEY') }}"></script>
<div class="mt-4 mb-4" style="max-width:600px">
    <form id="demo-form" action="#" method="post">
        @csrf
        <input type="hidden" name="type" value="regisSupport">
        <input type="hidden" name="title" value="Đăng ký support">
        
        <div class="form-group mb-3">
            <input class="form-control" type="text" name="name" placeholder="Name">
        </div>
        <div class="form-group mb-3">
            <input  class="form-control" type="text" name="email" placeholder="Email">
        </div>
        <div class="form-group mb-3">
            <input  class="form-control" type="text" name="meta_info" placeholder="Meta info">
        </div>
        
        <input type="hidden" name="messSuccess" value="Yêu cầu của bạn đã được gửi đi. Chúng tôi sẽ liên hệ trong thời gian sớm nhất.">
        <button type="submit" class="btn_received btn btn-primary" data-key="{{ env('GOOGLE_RECAPTCHA_V3_KEY') }}" data-form="demo-form">Submit</button>
    </form>
</div>
