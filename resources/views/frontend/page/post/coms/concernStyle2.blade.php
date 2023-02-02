<div id="concern" class="concern__style2 mt-3 mb-3">
   <h3 class="font22 text_green font-bold title-concern text-uppercase mb-3">
      Bài viết liên quan
   </h3>
   <div class="row" >
      @isset($data['concern'])
         @foreach ($data['concern'] as $p)
            <div class="col-md-4">
               <div class="inner">
                  <a href="{{ route('level1', ['slug' => $p->slug]) }}">
                     <div class="thumb hidden-md-down">
                        <img data-src="{{ !empty($p->thumb300) ? $p->thumb300 : asset('img/no_img.png') }}" class="lazyload img_cover"
                           alt="{{ $p->title }}">
                     </div>
                     <h3 class="font16 text_green webkit-box-2 pt-2">
                        <span class="hidden-md-up">@include('svg.arrow3')</span> {{ $p->title }}
                     </h3>
                  </a>
               </div>
            </div>
         @endforeach
         @endif
      </div>
   </div>
