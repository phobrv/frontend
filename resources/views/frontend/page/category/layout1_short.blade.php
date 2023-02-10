@if (isset($data['meta']['category_term_paginate_source'][0]))
    @php $p = $data['meta']['category_term_paginate_source'][0]; @endphp
    @include('phont::frontend.page.category.coms.boxPost1', ['p' => $p])
@endif
@if (isset($data['meta']['category_term_paginate_source']))
    @foreach ($data['meta']['category_term_paginate_source'] as $p)
        @if ($loop->index > 0)
            @include('phont::frontend.page.category.coms.boxPost2', ['p' => $p])
        @endif
    @endforeach
@endif
@if (isset($data['meta']['category_term_paginate_source']) && count($data['meta']['category_term_paginate_source']))
    <div id="pagination" class="w-100 mt-3   no-margin ">
        {{ $data['meta']['category_term_paginate_source']->links() }}
    </div>
@endif
