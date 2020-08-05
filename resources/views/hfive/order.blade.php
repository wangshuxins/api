
@extends('lyouts.all')
@section('title',"购物车")
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


<!-- checkout -->
<div class="checkout pages section">
    <div class="container">
        <div class="pages-head">
            <h3>CHECKOUT</h3>
        </div>
        <div class="checkout-content">
            <div class="row">

                <div class="col s12">

                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header active"><h5>1 - Checkout Method</h5></div>

                            <div class="collapsible-body">
                                <h6>Checkout as a Guest or Register</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis sunt</p>
                                <hr/>
                                <br/>
                                <h5>总价:￥<font color="#b8860b">{{$orders->goods_dotail}}</font></h5>
                                <br/>
                                @if($orders->is_real==0)

                                    <h5>支付方式:<font color="#6495ed">支付宝</font></h5>
                                    <a href="{{url('/pay/'.$orders->order_id)}}" class="btn button-default">去支付</a>
                                    @else
                                    <h5>支付方式:<font color="#ff4500">微信</font></h5>
                                    <a href="{{url('/wechat/'.$orders->order_id)}}" class="btn button-default">去支付</a>
                                    @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end checkout -->
<!-- end footer -->
@endsection
