@isset($data['tags'])
<ul id="tag-list" class="mb-3">
	<li class="label">Tag: </li>
	@foreach($data['tags'] as $term)
	<li class="tag-item">
		<a href="{{route('level2',['object'=>'tag','slug'=>$term->slug])}}">
			{{$term->name}}
		</a>
	</li>
	@endforeach
</ul>
@endif