<div class="swiper productConcernSlide pb-4 slideStyle2">
    <div class="swiper-wrapper">
        @foreach ($products as $p)
            @if($loop->index > 2)
            <div class="swiper-slide">
               <div class="item">
                    @include('phont::frontend.page.products.coms.boxProduct3', ['p' => $p])
               </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
