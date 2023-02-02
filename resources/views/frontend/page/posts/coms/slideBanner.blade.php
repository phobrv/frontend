<div class="swiper slideBanner mb-3">
    <div class="swiper-wrapper">
        @if (isset($data['meta']['banner_number']))
            @for ($i = 0; $i < $data['meta']['banner_number']; $i++)
                @php $banner = "banner".$i; @endphp
                <div class="swiper-slide">
                    <div class="thumb">
                        <img src="{{ $data['meta'][$banner] ?? '' }}" class="img_cover" alt="banner">
                    </div>
                </div>
            @endfor
        @endif
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
