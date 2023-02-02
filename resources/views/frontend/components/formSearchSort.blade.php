<li class="menu-item search-sort hidden-md-down">
    <a class="btn-sch">
        @include('svg.search')
    </a>
    <div class="content">
        <div class="search-container">
            <form action="{{ route('level1',['slug'=>'search']) }}" method="get">
                <input id="headerSearch" type="text" placeholder="Tìm kiếm tại đây..." name="q" />
                <button type="submit">
                    @include('svg.search')
                </button>
                <div id="listSearch" style=""></div>
            </form>
        </div>
    </div>
</li>
