@extends('phobrv::frontend.layout.1col')
@section('content')
   @include('phobrv::frontend.layout.breadcrumb')
   <div class="container">
      <div class="row mt-3">
         <div class="col-md-8">
            <div id="post">
               <h1>{{ $data['post']->title ?? '' }}</h1>
               @include('phobrv::frontend.components.ratingSimple.ratingBox')
               @include('phobrv::frontend.page.post.coms.mainContent')
               {!! $data['post']->content !!}
            </div>
            @include('phobrv::frontend.page.post.coms.boxTags')
            @include('phobrv::frontend.components.boxCommentFB')
            @include('phobrv::frontend.components.boxComment')
            @include('phobrv::frontend.page.post.coms.boxConcern')
         </div>
         <div id="sidebar" class="col-md-4 mb-3">
            <div id="submenuTop"></div>
            <div class="sidebar__submenu">
               <div class="main">
                  <div class="title">Nội dung bài viết</div>
                  {!! $data['post']->submenu ?? '' !!}
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@section('script')
   <script type="text/javascript">
      $(function() {
         $('#concern .thumb').css('height', $('#concern  .thumb').width() * 0.625);
         $('.sidebar__submenu').css('width', $('#sidebar').width())
      });
   </script>
@endsection
