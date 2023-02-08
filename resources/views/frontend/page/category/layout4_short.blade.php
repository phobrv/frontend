@if (isset($data['meta']['category_term_paginate_source']))
    @foreach ($data['meta']['category_term_paginate_source'] as $p)
        @include('phont::frontend.page.posts.coms.boxPost4', ['p' => $p])
    @endforeach
@endif
@if (isset($data['meta']['category_term_paginate_source']) && count($data['meta']['category_term_paginate_source']))
    <div id="pagination" class="w-100 mt-3   no-margin ">
        {{ $data['meta']['category_term_paginate_source']->links() }}
    </div>
@endif
