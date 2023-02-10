@extends("phont::frontend.layout.1col")
@section('content')
@include('phont::frontend.layout.breadcrumb')
<section id="recruitment-page">
	<div class="container">
		<div class="row">
			@isset($data['post'])
			<div class="col-md-3">
				<h3>Thông tin việc làm</h3>
				<ul class="info">
					<li>
						<div class="lable">Nơi làm việc</div>
						<div class="meta">@isset($data['post']['meta']['office']){{ $data['post']['meta']['office'] }}@endif</div>
					</li>
					<li>
						<div class="lable">Cấp bậc</div>
						<div class="meta">@isset($data['post']['meta']['rank']){{ $data['post']['meta']['rank'] }}@endif</div>
					</li>
					<li>
						<div class="lable">Bằng cấp</div>
						<div class="meta">@isset($data['post']['meta']['degree']){{ $data['post']['meta']['degree'] }}@endif</div>
					</li>
					<li>
						<div class="lable">Mức lương</div>
						<div class="meta">@isset($data['post']['meta']['wage']){{ $data['post']['meta']['wage'] }}@endif</div>
					</li>
					<li>
						<div class="lable">Hạn nộp hồ sơ</div>
						<div class="meta">@isset($data['post']['meta']['endTime']){{ date('d/m/Y',strtotime($data['post']['meta']['endTime'])) }}@endif</div>
					</li>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="main">
					<h1>{{ $data['post']->title }}</h1>
					{!! $data['post']->content !!}
					<div class="submit mt-3">
						<!-- <a class="btn" href="#">Ứng tuyển</a>
						<a class="btn" href="#">Tạo mẫu</a> -->
					</div>
				</div>

			</div>
			@endif
		</div>
	</div>
</section>
@endsection
