@include("phont::frontend.layout.header")
@include("phont::frontend.layout.breadcrumb")
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
			@include("phont::frontend.sidebar.banner")
			@include("phont::frontend.sidebar.category")
			@include("phont::frontend.sidebar.new")
			@include("phont::frontend.sidebar.fbBox")
		</div>
	</div>
</div>
@include("phont::frontend.layout.footer")
