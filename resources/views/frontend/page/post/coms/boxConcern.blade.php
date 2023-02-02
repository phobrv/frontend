@switch($configs['box_concern_layout'])
   @case('layout1')
      @include('phont::frontend.page.post.coms.concernStyle1')
   @break
   @case('layout2')
      @include('phont::frontend.page.post.coms.concernStyle2')
   @break

   @case('layout3')
      @include('phont::frontend.page.post.coms.concernStyle3')
   @break
   @default
      @include('phont::frontend.page.post.coms.concernStyle1')
   @break
@endswitch
