@extends('phont::frontend.layout.2col')
@section('content')
    <div id="products-page">
        @include('phont::frontend.page.productgroup.coms.slideBanner', ['data' => $data])
        @include('phont::frontend.page.productgroup.coms.filter')
        <div id="product_list">

        </div>
    </div>
@endsection

@section('script')
    <script>
        var swiper = new Swiper(".slideBanner", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        if (typeof(App) == 'undefined') {
            const App = {}
            App.filterPostList = {
                resize_thumb: function(){
                    $('.thumb').css('height',$('.thumb').width());
                },
                layout_select: function() {
                    $('#list_layout').on('click', function(e) {
                        $('#grid_layout').removeClass('active');
                        $('#grid_page').css('display', 'none')
                        $('#list_layout').addClass('active');
                        $('#list_page').css('display', 'block');
                    });
                },
                grid_select: function() {
                    $('#grid_layout').on('click', function(e) {
                        $('#list_layout').removeClass('active');
                        $('#grid_page').css('display', 'block')
                        $('#grid_layout').addClass('active');
                        $('#list_page').css('display', 'none');
                    });
                },
                order_select: function() {
                    let Root = this
                    $('#order_select').on('change', function(e) {
                        Root.getProductList()

                    });
                },
                size_select: function() {
                    let Root = this
                    $('#size_select').on('change', function(e) {
                        Root.getProductList()
                    });
                },
                paginate_select: function() {
                    let Root = this
                    $(document).on("click", ".pagination a", function(event) {
                        event.preventDefault();
                        var page = $(this).attr("href").split("page=")[1];
                        console.log(page)
                        Root.getProductList(page)
                    })
                },
                getProductList: function(page) {
                    let Root = this;
                    let order_select = document.getElementById("order_select").value
                    let size_select = document.getElementById("size_select").value
                    let term_id = document.getElementById("term_id").value ;
                    let data = {};
                    switch (order_select) {
                        case '0':
                        case 'title_asc':
                            data['sort'] = 'title';
                            data['order'] = 'asc';
                            break;
                        case 'title_desc':
                            data['sort'] = 'title';
                            data['order'] = 'desc';
                            break;
                        case 'price_asc':
                            data['sort'] = 'price';
                            data['order'] = 'asc';
                            break;
                        case 'price_desc':
                            data['sort'] = 'price';
                            data['order'] = 'desc';
                            break;
                    }
                    data['page'] = page;
                    data['size'] = size_select;
                    data['term_id'] = term_id;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route('api.getProduct') }}',
                        type: 'post',
                        data: data,
                        success: function(out) {
                            document.getElementById("product_list").innerHTML = out;
                            Root.resize_thumb();
                            window.scrollTo(0, 0);
                        }
                    });
                },
                init: function() {
                    let Root = this
                    Root.getProductList();
                    Root.layout_select();
                    Root.grid_select();
                    Root.order_select();
                    Root.size_select();
                    Root.paginate_select();
                    
                }
            }
            App.filterPostList.init();
        }
    </script>
@endsection
