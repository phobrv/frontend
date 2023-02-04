<form class="formSearchMobile" action="{{ route('level1',['slug'=>'search']) }}" method="get">
    <input id="headerSearch" type="text" placeholder="Tìm kiếm tại đây..." name="q" />
    <button type="submit" aria-label="search">
        @include('svg.search')
    </button>
    <div id="listSearch" style="">

    </div>
</form>