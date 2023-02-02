<div id="slideProduct" class="swiper">
  <div class="swiper-wrapper">
    @isset($data['gallery'])
    @foreach($data['gallery'] as $p)
    <div class="swiper-slide ">
      <div class="thumb">
        <img src="{{!empty($p) ? $p : asset('img/no_img.png')}}" class="img_cover" alt="placeholder+image">
      </div>
    </div>
    @endforeach
    @endif
  </div>
  <div class="swiper-pagination slideProduct-pagi"></div>
</div>
