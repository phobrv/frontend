<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 slideStyle2 mb-2">
   <div class="swiper-wrapper">
      @if (isset($data['gallery']))
         @foreach ($data['gallery'] as $p)
            <div class="swiper-slide">
               <div class="thumb text-center">
                  @include('phont::frontend.components.img',['source'=>$p ?? '','class'=>'img_cover','alt'=> 'product img','width'=>'250','height'=>'185'])

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
               @include('phont::frontend.components.img',['source'=>$p ?? '','class'=>'img_cover','alt'=> 'product img','width'=>'250','height'=>'185'])
              </div>
            </div>
         @endforeach
      @endif
   </div>
</div>
