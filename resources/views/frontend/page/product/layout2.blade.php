@extends('phont::frontend.layout.1col')
@section('content')
    <div id="product-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="position: relative">
                                @include('phont::frontend.page.product.coms.slideProduct')
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h1>{{ $data['post']->title ?? '' }}</h1>
                            <div class="meta">
                                {!! $data['post']->excerpt ?? '' !!}
                            </div>
                            <a href="javascript:showModalRequest({{ $data['post']->id }})" class="btn-contact">Yêu cầu báo giá</a>
                        </div>
                    </div>
                    <div class="product-detail mt-3">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Chi tiết sản phẩm</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Tab 2</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                {!! $data['post']->content !!}
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        </div>
                    </div>
                    @include('phont::frontend.components.boxCommentFB')

                </div>
                <div class="col-md-3">
                    <div id="boxRequestTop"></div>
                    <div id="boxRequest">
                        <div class="des">{{ $configs['boxRequest_des'] ?? '' }}</div>
                        <div class="mt-3">
                            <a href="javascript:showModalRequest({{ $data['post']->id }})" class="btn-request">Yêu cầu báo giá</a>
                        </div>
                        <div class="mt-3">
                            <a class="hotline" href="tel:{{ $configs['hotline_number'] ?? '' }}">
                                @include('svg.phone1') Hotline: {{ $configs['hotline_number'] ?? '' }}
                            </a>
                        </div>
                        <div class="mt-3">
                            <a class="hotline" href="tel:{{ $configs['hotline_number2'] ?? '' }}">
                                @include('svg.phone1') Hotline: {{ $configs['hotline_number2'] ?? '' }}
                            </a>
                        </div>
                        <div class="share mt-3">
                            <div class="fb-like" data-href="{{ $fullUrlNoQuery }}" data-width="" data-layout="button" data-action="like"
                                data-size="small" data-share="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalArea">

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        if ($('#slideCateProduct .swiper-slide').length > 0) {
            var slideCateProduct = new Swiper('#slideCateProduct', {
                init: false,
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.slideCateProduct-next',
                    prevEl: '.slideCateProduct-prev',
                },
                pagination: {
                    el: '.slideCateProduct-pagi',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                }
            });
            slideCateProduct.on('init', function() {
                $('#slideCateProduct .thumb').css('height', $('#slideCateProduct .thumb').width() * 0.65);

            });
            slideCateProduct.init();
        }
        if ($('#galleryPizeThumbs .swiper-slide').length > 0) {
            var galleryPizeThumbs = new Swiper('#galleryPizeThumbs', {
                init: false,
                spaceBetween: 10,
                slidesPerView: 5,
                loop: false,
                freeMode: false,
                loopedSlides: 5,
                watchSlidesVisibility: false,
                watchSlidesProgress: false,
            });
            var galleryTop = new Swiper('#swiperSP', {
                init: false,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 4500,
                },
                loopedSlides: 5,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryPizeThumbs,
                },
                zoom: {
                    maxRatio: 3,
                },
            });
            galleryPizeThumbs.on('init', function() {
                $('#galleryPizeThumbs .thumb').css('height', $('#galleryPizeThumbs .thumb').width() * 0.70);

            });
            galleryPizeThumbs.init();
            galleryTop.on('init', function() {
                $('#swiperSP .thumb').css('height', $('#swiperSP .thumb').width() * 0.70);

            });
            galleryTop.init();
        }

        function showModalRequest(product_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('api.quotePrice') }}',
                data: {
                    product_id: product_id
                },
                type: "post",
                success: function(out) {
                    $('#modalArea').empty().html(out);
                    var modalRequest = new bootstrap.Modal(document.getElementById('modalRequest'))
                    modalRequest.show()
                }
            });
        }
    </script>
@endsection
