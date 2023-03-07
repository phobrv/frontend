<div class="boxPost2 pt-3 pb-3">
    <a href="{{ route('level1', ['slug' => $p->slug]) }}">
        <div class="thumb">
            @include('phont::frontend.components.img',['source'=>$p->thumb ?? '','class'=>'img_cover','alt'=> $p->title ?? '','width'=>'250','height'=>'185'])
        </div>
    </a>
    <div class="content">
        <a href="{{ route('level1', ['slug' => $p->slug]) }}" class="">
            <h2 class="mt-md-2 font18 text-bold text-yellow mb-2 webkit-box-3">
                {{ $p->title }}
            </h2>
        </a>
        <p class="font16 webkit-box-3">
            {{ $p->excerpt }}
        </p>

        <div class="row">
            <div class="col-6">
                <div class="date_post_create">
                    @include('svg.calendar2') Ngày đăng {{ date('d/m/Y', strtotime($p->created_at)) }}
                </div>
            </div>
        </div>
    </div>
</div>
