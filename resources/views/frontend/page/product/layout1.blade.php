@extends('phobrv::frontend.layout.2col')
@section('content')
    <div id="product_page1">
        @if (isset($data['post']))
            <div class="row">
                <div class="col-md-6">
                    @include('phobrv::frontend.page.product.coms.slideWithThumb')
                </div>
                <div class="col-md-6">
                    <h1>{{ $data['post']->title ?? '' }}</h1>
                    <hr style="color: rgb(192, 192, 192)">
                    <div class="price">
                        <span class="cur">{{ number_format($data['price'] ?? 0) }}</span>
                        <span class="old">{{ number_format($data['price_odd'] ?? 0) }}</span>
                    </div>
                    <hr style="color: rgb(192, 192, 192)">
                    <div class="info">
                        @if (!empty($data['meta']['code']))
                            <div>
                                <label>Mã sản phẩm:</label> {{ $data['meta']['code'] ?? '' }}
                            </div>
                        @endif

                        @if (!empty($data['meta']['madein']))
                            <div>
                                <label>Xuất xứ:</label> {{ $data['meta']['madein'] ?? '' }}
                            </div>
                        @endif

                        @if (!empty($data['meta']['trademark']))
                            <div>
                                <label for="">Thương hiệu:</label> {{ $data['meta']['trademark'] ?? '' }}
                            </div>
                        @endif

                        @if (!empty($data['meta']['pack']))
                            <div>
                                <label for="">Quy cách đóng gói:</label> {{ $data['meta']['pack'] ?? '' }}
                            </div>
                        @endif
                        <div>
                            <label for="">Tình trạng: </label>
                            <span class="text-green">Còn hàng</span>
                        </div>
                    </div>
                    @if (!empty($data['meta']['desc']))
                        <hr style="color: rgb(192, 192, 192)">
                        {!! $data['meta']['desc'] ?? '' !!}
                    @endif
                    <hr style="color: rgb(192, 192, 192)">
                    <ul class="store">
                        <li>
                            <div id="product_number">
                                <span class="minus">
                                    @include('svg.minus_svg')
                                </span>
                                <span class="value" id="product_number_value">
                                    1
                                </span>
                                <span class="plus">
                                    @include('svg.plus_svg')
                                </span>
                            </div>
                        </li>
                        <li class="text">
                            1000 sản phẩm có sẵn
                        </li>
                    </ul>
                    <ul class="checkout mt-3">
                        <li>
                            <button data-qty='1' id="product{{ $data['post']->id }}" class="btn_add_to_cart add_only order_product ld-ext-right"
                                data-id="{{ $data['post']->id ?? '' }}">
                                <span> @include('svg.cart2') Đặt hàng</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </li>
                        <li>
                            <button data-checkout='1' data-qty='1' id="product{{ $data['post']->id }}"
                                class="btn_add_to_cart and_checkout order_product ld-ext-right" data-id="{{ $data['post']->id ?? '' }}">
                                <span> @include('svg.cart') Thanh toán ngay</span>
                                <div class="ld ld-ring ld-spin"></div>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="detail mt-3">
                <h3 class="dtitle">Chi tiết sản phẩm</h3>
                <div id="post">
                    {!! $data['post']->content ?? '' !!}
                </div>
            </div>
        @endif
    </div>
    @include('phobrv::frontend.components.boxCommentFB')
@endsection
@section('script')
    <script type="text/javascript">
        if ($('#slideProduct .swiper-slide').length > 0) {
            var slideProduct = new Swiper('#slideProduct', {
                init: false,
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.slideProduct-next',
                    prevEl: '.slideProduct-prev',
                },
                pagination: {
                    el: '.slideProduct-pagi',
                },
            });
            slideProduct.on('init', function() {
                $('#slideProduct .thumb').height($('#slideProduct .thumb').width() * 0.65)
            });
            slideProduct.init();
        }
        if ($('.mySwiper').length > 0) {
            var swiperThumb = new Swiper(".mySwiper", {
                loop: true,
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
                on: {
                    init: function() {
                        $('.mySwiper .thumb').css('height', $('.mySwiper .thumb').width() * 0.8)
                    },
                },
            });

            var swiper2 = new Swiper(".mySwiper2", {
                loop: true,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiperThumb,
                },
                on: {
                    init: function() {
                        $('.mySwiper2 .thumb').css('height', $('.mySwiper2 .thumb').width() * 0.7)
                    },
                },
            });
        }
    </script>
@endsection
