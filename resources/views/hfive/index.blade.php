@extends('lyouts.all')
@section('title',"首页")
@section('content')
        <!-- cart menu -->
<div class="menus" id="animatedModal">
    <div class="close-animatedModal close-icon">
        <i class="fa fa-close"></i>
    </div>
    <div class="modal-content">
        <div class="cart-menu">
            <div class="container">
                <div class="content">
                    <div class="cart-1">
                        <div class="row">
                            <div class="col s5">
                                <img src="/static/img/cart-menu1.png" alt="">
                            </div>
                            <div class="col s7">
                                <h5><a href="">Fashion Men's</a></h5>
                            </div>
                        </div>
                        <div class="row quantity">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input value="1" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>$20</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <div class="action"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="cart-2">
                        <div class="row">
                            <div class="col s5">
                                <img src="/static/img/cart-menu2.png" alt="">
                            </div>
                            <div class="col s7">
                                <h5><a href="">Fashion Men's</a></h5>
                            </div>
                        </div>
                        <div class="row quantity">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input value="1" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>$20</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <div class="action"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total">
                    <div class="row">
                        <div class="col s7">
                            <h5>Fashion Men's</h5>
                        </div>
                        <div class="col s5">
                            <h5>$21.00</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s7">
                            <h5>Fashion Men's</h5>
                        </div>
                        <div class="col s5">
                            <h5>$21.00</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s7">
                            <h6>Total</h6>
                        </div>
                        <div class="col s5">
                            <h6>$41.00</h6>
                        </div>
                    </div>
                </div>
                <button class="btn button-default">Process to Checkout</button>
            </div>
        </div>
    </div>
</div>
<!-- end cart menu -->

<!-- slider -->
<div class="slider">

    <ul class="slides">
        @foreach($huandeng as $v)
        <li>
            <img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" alt="">
            <div class="caption slider-content  center-align">
                <h2>欢迎来到 MSTORE</h2>
                <h4>Lorem ipsum dolor sit amet.</h4>
                <a href="" class="btn button-default">SHOP NOW</a>
            </div>
        </li>
       @endforeach
    </ul>

</div>
<!-- end slider -->

<!-- features -->
<div class="features section">
    <div class="container">
        <div class="row">
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <h6>Free Shipping</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <h6>Money Back</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
        </div>
        <div class="row margin-bottom-0">
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-support"></i>
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features -->

<!-- quote -->
<div class="section quote">
    <div class="container">
        <h4>FASHION UP TO 50% OFF</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
    </div>
</div>
<!-- end quote -->

<!-- product -->
<div class="section product">
    <div class="container">
        <div class="section-head">
            <h4>NEW PRODUCT</h4>
            <div class="divider-top"></div>
            <div class="divider-bottom"></div>
        </div>
        <div class="row">
            @foreach($goods as $v)
            <div class="col s6">
                <div class="content">
                    <img style="width:240px;height:200px" src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" >
                    <h6><a href="{{url('/detail/'.$v->goods_id)}}">{{$v->goods_name}}</a></h6>
                    <div class="price">
                        ${{$v->shop_price*0.8}} <span>${{$v->shop_price}}</span>
                    </div>
                    <a href="{{url('http://www.blog.com/goshop/'.$v->goods_id)}}" class="btn button-default">加入购物车</a>
                </div>
                <br>
            </div>

           @endforeach
        </div>
    </div>
</div>
<!-- end product -->

<!-- promo -->
<div class="promo section">
    <div class="container">
        <div class="content">
            <h4>PRODUCT BUNDLE</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            <button class="btn button-default">SHOP NOW</button>
        </div>
    </div>
</div>
<!-- end promo -->

<!-- product -->
<div class="section product">
    <div class="container">
        <div class="section-head">
            <h4>TOP PRODUCT</h4>
            <div class="divider-top"></div>
            <div class="divider-bottom"></div>
        </div>
        <div class="row">
               @foreach($hot_goods as $v)
            <div class="col s6">
                <div class="content">
                    <img style="width:240px;height:200px" src="{{env("UPLOADS_URL")}}{{$v->goods_img}}"  >
                    <h6><a href="{{url('/detail/'.$v->goods_id)}}">{{$v->goods_name}}</a></h6>
                    <div class="price">
                        ${{$v->shop_price*0.8}} <span>${{$v->shop_price}}</span>
                    </div>
                    <a href="{{url('http://www.blog.com/goshop/'.$v->goods_id)}}" class="btn button-default">加入购物车</a>
                </div>
                <br>
            </div>
            @endforeach
        </div>



    </div>
</div>
<!-- end product -->

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->
@endsection