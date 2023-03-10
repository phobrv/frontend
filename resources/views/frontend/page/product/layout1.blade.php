@extends('phont::frontend.layout.1col')
@section('content')
    {{-- {{dd($data['meta'])}} --}}
    @include('phont::frontend.layout.breadcrumb')
    <div class="container">
        <div id="product_page3" class="mt-3 style3">
            @if (isset($data['post']))
                <div class="top mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            @include('phont::frontend.page.product.coms.slideWithThumb')
                        </div>
                        <div class="col-md-7">
                            <h1 class="font30">{{ $data['post']->title ?? '' }}</h1>
                            <hr style="opacity:0.25">
                            <div class="price">
                                <span class="cur">
                                    @if(!empty($data['meta']['price'])) {{ number_format($data['meta']['price'] ?? 0) }}đ @endif
                                </span>
                                <span class="old">
                                    @if(!empty($data['meta']['price_old'])) {{ number_format($data['meta']['price_old'] ?? 0) }}đ @endif
                                </span>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
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

                                        @if (!empty($data['meta']['brand']))
                                            <div>
                                                <label for="">Thương hiệu:</label> {{ $data['meta']['brand'] ?? '' }}
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
                                </div>
                                <div class="col-md-7">
                                    {!! $data['post']->excerpt ?? '' !!}
                                </div>
                            </div>

                            <hr>
                            {!! $data['meta']['desc'] ?? '' !!}
                            <ul id="option">
                                @if (!empty($data['meta']['option_number']))
                                    @for ($i = 0; $i < $data['meta']['option_number']; $i++)
                                        @php
                                            $name = 'option' . $i . 'name';
                                            $status = 'option' . $i . 'status';
                                            $image = 'option' . $i . 'image';
                                            $active = !empty($data['meta'][$status]) ? '' : 'disactive';
                                        @endphp
                                        <li class="option_item {{ $active }}" data-idx="{{ $i }}"
                                            data-name="{{ $data['meta'][$name] ?? '' }}" data-status="{{ $data['meta'][$status] ?? 0 }}">
                                            {{ $data['meta'][$name] ?? '' }}
                                        </li>
                                    @endfor
                                @endif
                            </ul>
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
                                <li>
                                    <ul class="checkout ms-3">
                                        <li>
                                            <button data-option="" data-qty='1' id="product{{ $data['post']->id }}"
                                                class="btn_add_to_cart add_only order_product ld-ext-right" data-id="{{ $data['post']->id ?? '' }}">
                                                <span> @include('svg.cart2') Đặt hàng</span>
                                                <div class="ld ld-ring ld-spin"></div>
                                            </button>
                                        </li>
                                        <li>
                                            <button data-option="" data-checkout='1' data-qty='1' id="product{{ $data['post']->id }}"
                                                class="btn_add_to_cart and_checkout order_product ld-ext-right" data-id="{{ $data['post']->id ?? '' }}">
                                                <span> @include('svg.cart') Thanh toán ngay</span>
                                                <div class="ld ld-ring ld-spin"></div>
                                            </button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="giaohang">
                                <span class="label">Thời gian giao hàng dự kiến: </span>
                                <span class="text">2 - 4 ngày khu vực nội thành, 3 - 5 ngày tỉnh thành khác</span>
                            </div>
                            @if (!empty($configs['contact_order_active']))
                                <hr>
                                <div class="contact_order">
                                    {!! $configs['contact_order_content'] ?? '' !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="detail mt-3">
                            <h3 class="dtitle">Chi tiết sản phẩm</h3>
                            <div id="post">
                                {!! $data['post']->content ?? '' !!}
                            </div>
                        </div>
                        <div id="rating_area" data-url="{{ route('api.getRatingV2Data', ['id' => $data['post']->id]) }}">
                        </div>

                    </div>
                    <div class="col-md-3">
                        @include('phont::frontend.page.product.coms.boxPromo')
                        @include('phont::frontend.page.product.coms.productHot')
                    </div>
                </div>
            @endif
        </div>
        <div id="product-concern" class="mt-3">
            <div class="title">Sản phẩm liên quan</div>
            <div class="inner">
                @include('phont::frontend.page.product.coms.productConcernSlide', ['products' => $data['concern']])
            </div>
        </div>
        @include('phont::frontend.components.boxCommentFB')
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        if (typeof(App) == 'undefined') {
            const App = {}
            App.RattingV2 = {
                copyToClipboard: function() {
                    $('#copy_to_clipboard').on("click", function(e) {
                        e.preventDefault()
                        var copyText = document.getElementById("promo_code");
                        copyText.select();
                        document.execCommand('copy')
                        alert('Copy code ' + copyText.value)

                    })
                },
                eventSubmit: function() {
                    $('#formRating').on("submit", function(e) {
                        e.preventDefault()
                        var form = $("#formRating");
                        var url = form.attr('action')
                        var data = form.serializeArray()
                        console.log(data)
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            data: data,
                            type: 'post',
                            success: function(out) {
                                document.forms['formRating']['name'].value = "";
                                document.forms['formRating']['content'].value = "";
                                $('#confirm').css('display', 'block');
                                setTimeout(function() {
                                    $('#confirm').css('display', 'none')
                                }, 2000)
                            }
                        });
                    });
                },
                getDataRating: function() {
                    let Root = this
                    if ($('#rating_area').length > 0) {
                        let url = document.getElementById("rating_area").dataset.url;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            type: 'get',
                            success: function(out) {
                                document.getElementById("rating_area").innerHTML = out;
                                Root.eventSubmit()
                            }
                        });
                    }
                },
                init: function() {
                    let Root = this
                    Root.getDataRating();
                    Root.eventSubmit()
                    Root.copyToClipboard()
                }
            }
            App.RattingV2.init()
        }
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
                slidesPerView: 5,
                freeMode: true,
                watchSlidesProgress: true,
                watchActiveIndex: true,
                on: {
                    init: function() {
                        $('.mySwiper .thumb').css('height', $('.mySwiper .thumb').width() * 0.8)
                    },
                },
            });

            var swiperMain = new Swiper(".mySwiper2", {
                loop: true,
                spaceBetween: 10,
                watchActiveIndex: true,
                watchSlidesProgress: true,
                freeMode: true,
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
            $('.option_item').on('click', function(e) {
                e.preventDefault()
                var idx = e.target.dataset.idx
                var optionName = e.target.dataset.name
                var status = e.target.dataset.status
                if (status != 0) {
                    swiperThumb.slideTo(idx, 0, false)
                    swiperMain.slideToLoop(idx, 0, false)
                    $('#option').find('li').removeClass('active')
                    var add_only = document.getElementsByClassName("add_only")[0]
                    var and_checkout = document.getElementsByClassName("and_checkout")[0]
                    add_only.dataset.option = optionName;
                    and_checkout.dataset.option = optionName;
                    event.target.classList.add('active');
                } else {
                    alert("Hiện tại không có hàng cho option này.")
                }

            })
        }
        if ($('.productConcernSlide').length > 0) {
            var swiper2 = new Swiper(".productConcernSlide", {
                autoplay: {
                    delay: 3000,
                },
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 0
                    },
                    992: {
                        slidesPerView: 5,
                        spaceBetween: 0
                    }
                },
                on: {
                    init: function() {
                        $('.productConcernSlide .thumb').css('height', $('.productConcernSlide .thumb').width())
                    },
                },
            });
        }
    </script>
@endsection
