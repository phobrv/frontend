@switch($configs['box_concern_layout'])
   @case('layout1')
      @include('phobrv::frontend.page.post.coms.concernStyle1')
   @break
   @case('layout2')
      @include('phobrv::frontend.page.post.coms.concernStyle2')
   @break

   @case('layout3')
      @include('phobrv::frontend.page.post.coms.concernStyle3')
   @break
   @default
      @include('phobrv::frontend.page.post.coms.concernStyle1')
   @break
@endswitch
