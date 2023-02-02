@if (!empty($data['breadcrumb']))
    <section id="breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                        {!! $data['breadcrumb'] !!}
                </ol>
            </nav>
        </div>
    </section>
@endif
