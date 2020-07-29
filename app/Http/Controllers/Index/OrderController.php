<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class OrderController extends Controller
{
    public function order(){
        return view("hfive.order");
    }
    public function pay(request $request){
        $oid = $request->get("oid");
        //echo "订单ID:".$oid;
        //1请求参数
        $param2 = [
            'out_trade_no' => time().mt_rand(11111,99999),
            'product_code' =>'FAST_INSTANT_TRADE_PAY',
            'total_amount' => 0.01,
            'subject' => '1911-测试订单-'.Str::random(16),
        ];
        //2 公共参数
        $param1 = [
            'app_id'    => '2016102200739406',
            'method'    => 'alipay.trade.page.pay',
            'return_url'=>'http://www.1911.com/alipay/return',
            'charset'   => 'utf-8',
            'sign_type' => 'RSA2',
            'timestamp' => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'=> "http://www.1911.com/alipay/notify",
            'biz_content'=>json_encode($param2),

        ];
        //计算签名
       // echo '<pre>';print_r($param1);echo '</pre>';
        ksort($param1);
        //echo '<pre>';print_r($param1);echo '</pre>';
        $str = "";
        foreach($param1 as $k=>$v){
            $str.=$k.'='.$v.'&';
        }
       $str =  rtrim($str,'&'); //拼接参数
       $sign = $this->sign($str);
        //沙箱测试地址
       $url = 'https://openapi.alipaydev.com/gateway.do?'.$str.'&sign='.urlencode($sign);
       return redirect($url);
    }

    protected function sign($data)
    {
//        if ($this->checkEmpty($this->rsaPrivateKeyFilePath)) {
//            $priKey = $this->rsaPrivateKey;
//            $res = "-----BEGIN RSA PRIVATE KEtY-----\n" .
//                wordwrap($priKey, 64, "\n", true) .
//                "\n-----END RSA PRIVATE KEY-----";
//        } else {aaa
//            $priKey = file_get_contents($this->rsaPrivateKeyFilePath);
//            $res = openssl_get_privatekey($priKey);
//        }
          $prikey = file_get_contents(storage_path('keys/ali_priv.key'));
          $res = openssl_get_privatekey($prikey);
          ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
            openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
            openssl_free_key($res);
            $sign = base64_encode($sign);
            return $sign;
    }
}
