@include("phobrv::frontend.layout.header")
@include("phobrv::frontend.layout.breadcrumb")
<section id="slide">
	@yield('slide')
</section>
@yield('content_top')
<div class="container">
	<div class="row mt-3">
		<div class="col-md-8 col-lg-9">
			@yield('content')
		</div>
		<div id="sidebar" class="col-md-4 col-lg-3 mb-3">
			@include("phobrv::frontend.sidebar.banner")
			@include("phobrv::frontend.sidebar.category")
			@include("phobrv::frontend.sidebar.new")
			@include("phobrv::frontend.sidebar.fbBox")
		</div>
	</div>
</div>
@include("phobrv::frontend.layout.footer")
