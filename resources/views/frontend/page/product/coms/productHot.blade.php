<div class="product_hot mt-3">
    <div class="title">Top sản phẩm bán chạy</div>
    <ul>
        @if (isset($data['products_hot']))
            @foreach ($data['products_hot'] as $p)
                <li class="mb-3">
                    <a href="{{ route('level1', ['slug' => $p->slug]) }}">
                        <div class="mb-2">
                            @include('phont::frontend.components.img',['source'=>$p->thumb ?? '','class'=>'img_cover','alt'=> $p->title ?? '','width'=>'250','height'=>'185'])
                        </div>
                        <h3>{{ $p->title ?? '' }}</h3>
                        <div class="price">
                            <div class="cur">
                                @if(!empty($p['meta']['price'])) {{ number_format($p['meta']['price'] ?? 0) }} đ @endif
                            </div>
                            <div class="old"> 
                                @if(!empty($p['meta']['price_old'])) {{ number_format($p['meta']['price_old'] ?? 0) }} đ @endif
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>