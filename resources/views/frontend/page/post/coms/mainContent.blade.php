@if(!isset($configs['post_main_content_active']) || $configs['post_main_content_active'])
<div id="post_sub_menu" class="mb-3">
	<div class="text-center">
		<h3>Nội dung chính [<span id="toggle_box">Hiện</span>] </h3>
	</div>
	{!!$data['post']->submenu ?? ''!!}
</div>
@endif