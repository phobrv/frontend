<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_V3_KEY') }}"></script>
<form id="demo-form" action="#" method="post">
    @csrf
    <input type="hidden" name="type" value="regisSupport">
    <input type="text" name="name" >
    <input type="text" name="email">
    <input type="hidden" name="messSuccess" value="Yêu cầu của bạn đã được gửi đi. Chúng tôi sẽ liên hệ trong thời gian sớm nhất.">
    <button type="submit" class="btn_received" data-key="{{ env('GOOGLE_RECAPTCHA_V3_KEY') }}" data-form="demo-form">Submit</button>
</form>
