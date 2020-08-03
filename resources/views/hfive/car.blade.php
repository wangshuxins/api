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

<!-- cart -->
<div class="cart section">
    <div class="container">
        <div class="pages-head">
            <h3>CART</h3>
        </div>
        <div class="content" >

            @foreach($car as $v)
            <div class="cart-1" id="div_id">
                <div class="row" >

                    <div class="col s5"  >
                        <h5>Image</h5>
                    </div>
                    <div class="col s7">
                        <img style="width:300px;height:200px" src="{{env('UPLOADS_URL')}}{{$v->image}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Name</h5>
                    </div>
                    <div class="col s7">
                        <h5><a href="{{url('/detail/'.$v->goods_id)}}">{{$v->name}}</a></h5>
                    </div>
                </div>
                <div class="row" id="price">
                    <div class="col s5">
                        <h5>Quantity</h5>
                    </div>
                    <div class="col s7">
                        <input  class="kuang" goods_number="{{$v->goods_number}}" goods_id="{{$v->goods_id}}" type="text" value="{{$v->quantity}}" style="width:100px">
                        {{--<input type="text" value="{{$v->quantity}}">--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Price</h5>
                    </div>
                    <div class="col s7">
                        <h5>￥{{$v->price}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Action</h5>
                    </div>
                    <div class="col s7">
                        <h5><i class="fa fa-trash del"  goods_id="{{$v->goods_id}}">删除</i></h5>
                    </div>

                </div>
                <div>
                    <hr>
                    <br>
                </div>
            </div>

           @endforeach
        </div>
        <a class="btn button-default">确认结算</a>
    </div>
</div>
<!-- end cart -->

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->
<script>
$(document).on("blur",".kuang",function(){
     _this = $(this);
    var text = _this.val();
    var goods_number = parseInt(_this.attr("goods_number"));
    var goods_id = _this.attr("goods_id");
    if(text==''){
       _this.val(1);
       alert("购买数量不能为空!");return;
   }else if(!(/^[1-9][0-9]{0,6}$/.test(text))){
       _this.val(1);
       alert("请填写正确的购买数量!");return;
   }else if(text>goods_number){
       _this.val(goods_number);
       alert("库存不足!");return;
   }
    $.ajax({
        type:"get",
        dataType:"json",
        url:"http://www.blog.com/car",
        data:{"goods_id":goods_id,"goods_number":text},
        async:false,
        success:function(res){
         if(res.error_no==0){
               _this.parents("#price").next().children().next().html("<h5>￥"+res.price+"</h5>");
         }
        }
    })
})
    $(document).on("click",".del",function(){
        _this = $(this);
        var text = _this.val();
        var goods_id = _this.attr("goods_id");
        $.ajax({
            type:"get",
            dataType:"json",
            url:"http://www.blog.com/del",
            data:{"goods_id":goods_id},
            success:function(res){
                if(res.error_no==0){
                 _this.parents("#div_id").remove();
                }
            }
        })
    });

</script>
@endsection