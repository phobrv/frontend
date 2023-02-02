<div>
  <div id="swiperSP" class="swiper gallery-top gallery">
    <div class="swiper-wrapper">
      @isset($data['gallery'])
      @foreach($data['gallery'] as $p)
      <div class="swiper-slide ">
        <div class="swiper-zoom-container">
          <div class="thumb">
            <a href="{{ $p }}">
              <img src="{{$p}}" class="img_cover" alt="placeholder+image">
            </a>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>
<div id="slidePizeThumbs" class="" style="position: relative;">
  <div id="galleryPizeThumbs" class="swiper gallery-thumbs mt-3">
    <div class="swiper-wrapper">
      @isset($data['gallery'])
      @foreach($data['gallery'] as $p)
      <div class="swiper-slide">
        <div class="thumb">
          <img data-src="{{$p}}" class="img_cover lazyload" alt="placeholder+image">
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>
<script>

</script>