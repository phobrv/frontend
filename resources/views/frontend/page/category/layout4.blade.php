@extends('phobrv::frontend.layout.1col')
@section('content')
    @include('phobrv::frontend.layout.breadcrumb')
    
    <div class="container">
		@include('phobrv::frontend.page.category.coms.slideBanner')
        <div id="cagegory_page4" class="category_main mt-3">
            @include('phobrv::frontend.page.category.layout4_short')
        </div>
		@include('phobrv::frontend.components.boxCommentFB')
    </div>
@endsection

@section('script')
    <script>
        $('.boxPost4 .thumb').css('height', $('.boxPost4 .thumb').width() * 0.6)

        var swiper = new Swiper(".slideBanner", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
