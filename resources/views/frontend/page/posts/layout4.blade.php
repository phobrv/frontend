@extends('phont::frontend.layout.1col')
@section('content')
    @include('phont::frontend.layout.breadcrumb')
    
    <div class="container">
		@include('phont::frontend.page.posts.coms.slideBanner')
        <div id="cagegory_page4" class="category_main mt-3">
            @include('phont::frontend.page.posts.layout4_short')
        </div>
		@include('phont::frontend.components.boxCommentFB')
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
