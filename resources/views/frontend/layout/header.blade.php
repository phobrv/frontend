<!DOCTYPE html>
<html lang="vi">
<head>
    @include("phont::frontend.layout.meta")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{$configs['favicon'] ?? ''}}">
    <link rel="canonical" href="{{$fullUrlNoQuery}}" />
    <link rel="stylesheet preload" type="text/css" href="{{asset('/css/main.css')}}">
    @if(!empty($configs['customize_css_active']))
    <link rel="stylesheet  preload" type="text/css" href="{{asset('/css/customize.css')}}">
    @endif
    @yield('head')
    @include("phont::frontend.layout.schema")
    {!!$configs['code_head'] ?? '' !!}
</head>
@php
    function formatPhone($number)
    {
        $result = '';
        if (preg_match('/^(\d{4})(\d{3})(\d{3})$/', $number, $matches)) {
            $result = $matches[1] . ' ' . $matches[2] . '.' . $matches[3];
        }
        else if(preg_match('/^(\d{4})(\d{4})$/', $number, $matches)){
            $result = $matches[1] . ' ' . $matches[2] ;     
        }
        return $result;    
    }
@endphp
<body>
    <header style="background-color:#18476d; background-image: url('{{ $configs['header_bg'] ?? '' }}');">
        <div class="header__top container">
            <div class="row">
                <div class="col-md-2 hidden-md-down">
                    <a class="header__logo" href="{{ route('home') }}">
                        {{ $configs['site_name'] ?? '' }}
                    </a>
                </div>
                <div class="col-md-10">
                    @include("phont::frontend.layout.menu")
                    {{-- @include("phont::frontend.components.googleTransBtn") --}}
                </div>
            </div>
        </div>
        <div class="meta container text-center">
            <div class="header__title">{{ $configs['header_title'] ?? '' }}</div>
            <div class="header__desc">{{ $configs['header_desc'] ?? '' }}</div>
        </div>
    </header>
