@if (count($posts))

    <div id="grid_page" style="display: block">
        <div class="row g-5">
            @foreach ($posts as $p)
                <div class="col-6 col-lg-3">
                    @include('phont::frontend.page.productgroup.coms.boxProduct3', ['p' => $p])
                </div>
            @endforeach
        </div>
    </div>
    <div id="list_page" style="display: none">
        <div class="row g-5">
            @foreach ($posts as $p)
                <div class="col-12">
                    @include('phont::frontend.page.productgroup.coms.boxProduct4', ['p' => $p])
                </div>
            @endforeach
        </div>
    </div>
        <div id="pagination" class="w-100 mt-3  no-margin ">
            {{ $posts->links() }}
        </div>
@else
<div class="text-center p-5">
    Sản phẩm không tìm thấy.    
</div>   
@endif
