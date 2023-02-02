@if(!empty($configs['promo_active']))
<div id="box_promo">
    <div class="title">
        {{$configs['promo_title'] ?? ''}}
    </div>
    <div class="inner">
        <div class="info">
            <div class="desc">{{$configs['promo_desc'] ?? ''}}</div>
            <div class="date">HSD: {{date('d/m/Y',strtotime($configs['promo_date'] ?? ''))}}</div>
        </div>
        <div class="btn-copy">
            <input type="text" style="height:2px; width: 20px;opacity:0" id="promo_code" value="{{$configs['promo_code'] ?? ''}}">
            <button id="copy_to_clipboard" >Copy</button>
        </div>
    </div>
</div>
@endif