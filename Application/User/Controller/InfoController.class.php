<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/5/1
 * Time: 15:20
 */
namespace User\Controller;
use Think\Controller;
class InfoController extends Controller {
    public function index(){
        $username=$_SESSION['username'];
        $this->assign('vo',M('user')->where("username='$username'")->find());
        $this->display();
    }
    public function update(){
        $user=M('user');
        $id= session('username');
        $password=md5($_POST['password']);
        $repasswd=md5($_POST['repasswd']);
        $mobile=$_POST['mobile'];
        $org=$_POST['org'];
        if($password!=$repasswd){
            $this->error('两次输入的密码不同,请重新输入');
        }else{
            $user-> where("username='$id'")->setField('password',$password);
            $user-> where("username='$id'")->setField('mobile',$mobile);
            $user-> where("username='$id'")->setField('org',$org);
            $this->success('修改成功!');
        }

    }
}