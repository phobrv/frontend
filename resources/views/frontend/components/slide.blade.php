<div class="hidden-md-down">
  <div id="slidePc" class="swiper slideStyle1">
    <div class="swiper-wrapper">
      @isset($data['meta']['album_post_pc_source']->meta['images'])
      @foreach($data['meta']['album_post_pc_source']->meta['images'] as $p)
      <div class="swiper-slide">
        <img src="{{ $p['thumb'] }}" alt="{{$p['title']}}" class="img_cover">
      </div>
      @endforeach
      @endif
    </div>
    <div class="swiper-pagination slidePc-pagi"></div>
    <div class="swiper-button-prev slidePc-prev"></div>
    <div class="swiper-button-next slidePc-next"></div>
  </div>
</div>
<div class="hidden-lg-up">
  <div id="slideMobile" class="swiper slideStyle1">
    <div class="swiper-wrapper">
      @isset($data['meta']['album_post_mobile_source']->meta['images'])
      @foreach($data['meta']['album_post_mobile_source']->meta['images'] as $p)
      <div class="swiper-slide">
        <img src="{{ $p['thumb'] }}" alt="{{$p['title']}}" class="img_cover">
      </div>
      @endforeach
      @endif
    </div>
    <div class="swiper-pagination slideMobile-pagi"></div>
    <div class="swiper-button-prev slideMobile-prev"></div>
    <div class="swiper-button-next slideMobile-next"></div>
  </div>
</div>
