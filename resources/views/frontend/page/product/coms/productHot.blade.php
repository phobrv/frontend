<div class="product_hot mt-3">
    <div class="title">Top sản phẩm bán chạy</div>
    <ul>
        @if (isset($data['products_hot']))
            @foreach ($data['products_hot'] as $p)
                <li class="mb-3">
                    <a href="{{ route('level1', ['slug' => $p->slug]) }}">
                        <div class="mb-2">
                            <img data-src="{{ $p->thumb }}" class="lazyload img_cover" alt="">
                        </div>
                        <h3>{{ $p->title ?? '' }}</h3>
                        <div class="price">
                            <div class="cur">{{ number_format($p['meta']['price'] ?? 0, 0, ',', '.') }}đ</div>
                            <div class="old">{{ number_format($p['meta']['price_old'] ?? 0, 0, ',', '.') }}đ</div>
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>