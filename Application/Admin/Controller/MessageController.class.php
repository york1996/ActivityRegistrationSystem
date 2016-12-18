<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/4/24
 * Time: 18:14
 */
namespace Admin\Controller;
use Think\Controller;

class MessageController extends Controller{
    public function index(){
        $this->display();
    }
    public function sent()
    {
        $mobile = $_POST['mobile'];
        $time = $_POST['time'];
        $title = $_POST['title'];
        $address = $_POST['address'];
        $appkey = "23353600";//你的App key
        $secret = "43253445bee2ee87f242ed3c18c1d412";//你的App Secret:
        import('Org.Taobao.top.TopClient');
        import('Org.Taobao.top.ResultSet');
        import('Org.Taobao.top.RequestCheckUtil');
        import('Org.Taobao.top.TopLogger');
        import('Org.Taobao.top.request.AlibabaAliqinFcSmsNumSendRequest');
        $c = new \TopClient;
        $c->appkey = $appkey;
        $c->secretKey = $secret;
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("活动通知");
        $req->setSmsParam("{'time':'$time','title':'$title','address':'$address'}");
        $req->setRecNum("$mobile");
        $req->setSmsTemplateCode("SMS_8130875");
        $resp = $c->execute($req);
        //var_dump($resp);
        $this->success('发送成功',U('Message/Index'));
    }

}