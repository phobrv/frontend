<div class="sbox">
	<div class="sidebar__category">
		<div class="title">{{ $configs['sb_category_title'] ?? '' }}</div>
		<ul>
			@isset($configs['sb_category_number'])
			@for($i=0;$i<$configs['sb_category_number'];$i++)
			@php
			$title = "sb_cate".$i."_title";
			$link = "sb_cate".$i."_link";
			@endphp
			<li>
				<a href="{{ $configs[$link] ?? '#' }}">
					{{ $configs[$title] ?? '' }}
				</a>
			</li>
			@endfor
			@endif

		</ul>
	</div>
</div>
