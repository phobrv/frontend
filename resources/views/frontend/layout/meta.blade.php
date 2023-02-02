<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="content-language" content="vi" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noodp,index,follow" />
<meta name='revisit-after' content='1 days' />

@isset($data['meta']['meta_description'])
<meta name="description" content="{{$data['meta']['meta_description']}}">
<meta property="og:description" content="{{$data['meta']['meta_description']}}" />
<meta property="twitter:description" content="{{$data['meta']['meta_description']}}">
@endif

@isset($data['meta']['meta_keywords'])
<meta name="keywords" content="{{$data['meta']['meta_keywords']}}">
@endif

@php
$title = !empty($data['meta']['meta_title']) ? $data['meta']['meta_title'] : (!empty($data['post']->title) ? $data['post']->title : '');
@endphp
<meta property="og:title" content="{{$title}}" />
<meta property="twitter:title" content="{{$title}}">
<title>{{$title}}</title>

@isset($configs['site_name'])
<meta name="twitter:site" content="{{$configs['site_name']}}" />
<meta property="og:site_name" content="{{$configs['site_name']}}" />
@endif

<meta property="og:locale" content="vi" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{$fullUrlNoQuery}}" />


<!-- property twitter -->
<meta property="twitter:card" content="summary">
<meta property="twitter:url" content="{{$fullUrlNoQuery}}">


@if(!empty($data['meta']['meta_thumb']))
<meta property="og:image" content="{{$data['meta']['meta_thumb'] ?? ''}}" />
<meta property="twitter:image" content="{{$data['meta']['meta_thumb'] ?? ''}}">
@endif

@isset($configs['fb_app_id'])
<meta property="fb:app_id" content="{{$configs['fb_app_id'] ?? ''}}" />
@endif
@isset($configs['google_tag_id'])
<meta property="google_tag_id" content="{{$configs['google_tag_id'] ?? ''}}" />
@endif