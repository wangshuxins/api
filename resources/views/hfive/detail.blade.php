@extends('lyouts.all')
@section('title',"商品详情")
@section('content')
<!-- shop single -->
<div class="pages section">
    <div class="container">

        <div class="shop-single">
            <img src="{{env("UPLOADS_URL")}}{{$detail->goods_img}}" alt="">
            <h5>{{$detail->goods_name}}</h5>
            <div class="price">${{$detail->shop_price*0.8}} <span>${{$detail->shop_price}}</span></div>
            <p>{{$detail->goods_desc}}</p>
            <a href="{{url('http://www.blog.com/goshop/'.$detail->goods_id)}}" type="button" class="btn button-default">加入购物车</a>
        </div>

    </div>
</div>
<!-- end shop single -->

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->
@endsection