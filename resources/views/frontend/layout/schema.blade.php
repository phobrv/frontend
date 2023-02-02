@php
    $content = [];
    $url = config('app.url');
    $name = config('app.name');
    $logo = isset($configs['logo_img']) ? $configs['logo_img'] : asset('favicon.png');
    
@endphp
<script type='application/ld+json'>
	{
		"@context":"https://schema.org",
		"@type":"Organization",
		"url":"{{$url}}",
		"sameAs":[],
		"@id":"{{$url}}/#organization",
		"name":"{{ $name }}",
		"logo":"{{ $logo  }}"
	}
</script>

<script type='application/ld+json'>{
	"@context":"https://schema.org",
	"@type":"WebSite",
	"@id":"{{$url}}/#website",
	"url":"{{$url}}/",
	"name":"{{ $name }}",
	"potentialAction":
	{
		"@type":"SearchAction",
		"target":"{{$url}}/search?q={search_term_string}",
		"query-input":"required name=search_term_string"
	}
}
</script>
@if (!empty($configs['mainMenu']))
    @foreach ($configs['mainMenu'] as $menu)
        @php
            $item = [
                '@context' => 'https://schema.org',
                '@type' => 'SiteNavigationElement',
                'id' => 'site-navigation',
                'name' => $menu->title,
                'url' => $menu->url,
            ];
            array_push($content, $item);
        @endphp
    @endforeach
@endif
<script type="application/ld+json">
	{
		"@context":"https:\/\/schema.org",
		"@graph":[{!! json_encode($content) !!}]
	}
</script>

@if (!empty( $data['post']->type) && $data['post']->type == 'post')
    <script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "NewsArticle",
		"headline": "{{ $data['post']->title }}",
		"mainEntityOfPage": "{{ $url }}",
		"alternativeHeadline": "{{ $data['post']->title }}",
		"image": "{{ $data['post']->thumb ?? asset('favicon.png') }}",
		"author": { 
			"@type": "Person",
			"name": "{{ $name }}",
			"url": "#"
	 	},
		"datePublished": "{{ date('Y-m-d',strtotime($data['post']->created_at)) }}",
		"dateModified": "{{ date('Y-m-d',strtotime($data['post']->updated_at)) }}",
		"description": "{{ $data['post']->excerpt }}"
	}
</script>
@endif