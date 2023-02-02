@php 
    $arraySelect = [
        "0"=>"Mặc định",
        'title_asc'=>'Tên (A>Z)',
        'title_desc'=>'Tên (Z>A)',
        'price_asc'=>'Giá (Thấp>Cao)',
        'price_desc'=>'Giá (Cao>Thấp)',
    ];
    $arrayPageSize =[
        "9"=>'9',
        "18"=>'18',
        "24"=>'24',
        "36"=>'36'
];
@endphp
<div id="product_filter">
    <input type="hidden" id="term_id" value="{{$data['meta']['category_term_paginate'] ?? '0'}}">
    <ul>
        <li class="layout">
            <button class="btn_layout" id="list_layout">@include('svg.list')</button>
            <button class="btn_layout active"  id="grid_layout">@include('svg.grid2')</button>
        </li>
        <li class="order">
            Sắp xếp theo 
            <select name="order_select" id="order_select">
                @foreach($arraySelect as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </li>
        <li class="page_size">
            Hiên thị 
            <select name="" id="size_select">
                @foreach($arrayPageSize as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </li>
    </ul>
</div>