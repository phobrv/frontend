@switch($configs['post_page_layout'])
   @case('layout1')
      @include('phont::frontend.page.post.layout1')
   @break

   @case('layout2')
      @include('phont::frontend.page.post.layout2')
   @break

   @default
      @include('phont::frontend.page.post.layout1')
   @break
@endswitch
