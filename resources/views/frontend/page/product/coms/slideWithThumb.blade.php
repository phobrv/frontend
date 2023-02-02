<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 slideStyle2 mb-2">
   <div class="swiper-wrapper">
      @if (isset($data['gallery']))
         @foreach ($data['gallery'] as $p)
            <div class="swiper-slide">
               <div class="thumb text-center">
                  <img src="{{$p}}"  style="height: 100%; width:auto;"/>
               </div>
            </div>
         @endforeach
      @endif
   </div>
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
</div>
<div thumbsSlider="" class="swiper mySwiper">
   <div class="swiper-wrapper">
      @if (isset($data['gallery']))
         @foreach ($data['gallery'] as $p)
            <div class="swiper-slide">
              <div class="thumb">
               <img src="{{$p}}"  class="img_cover"/>
              </div>
            </div>
         @endforeach
      @endif
   </div>
</div>
