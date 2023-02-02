@if (isset($data['items']) && count($data['items']))
    <div id="grid_page" style="display: block">
        <div class="row g-5">
            @foreach ($data['items'] as $p)
                <div class="col-6 col-lg-4">
                    @include('phont::frontend.page.products.coms.boxProduct3', ['p' => $p])
                </div>
            @endforeach
        </div>
    </div>
    <div id="list_page" style="display: none">
        <div class="row g-5">
            @foreach ($data['items'] as $p)
                <div class="col-12">
                    @include('phont::frontend.page.products.coms.boxProduct4', ['p' => $p])
                </div>
            @endforeach
        </div>
    </div>

    @php
        $total_page = ceil($data['count'] / $data['page_size']);
    @endphp
    @if ($total_page)
        <div id="paginate" class="d-flex justify-content-center style1 mt-3 mb-3">
            <input type="hidden" id="page" value="{{ $data['page'] ?? 1 }}">
            <ul class="d-flex justify-content-center">
                @for ($i = 0; $i < $total_page; $i++)
                    <li>
                        <div data-page="{{ $i + 1 }}" class="item @if ($data['page'] == $i + 1) active @endif">
                            {{ $i + 1 }}
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
    @endif
@endif
