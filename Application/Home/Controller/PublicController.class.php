<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function Login($username=NULL,$password=NULL){
        if(IS_POST){
            $user = M('user');
            $admin = M('admin');
            $org = M('org');
            $map['username'] = $username;
            if($_POST['type']==1){
                $users=$user->where($map)->find();
                if(!$users){
                    $this->error('帐号不存在或被禁用');
                }
                if($users['password'] != md5($password)){
                    $this->error('密码错误');
                }
                /* 记录登录SESSION */
                session('name',$users['name']);
                session('type','1');
                session('username',$users['username']);
                $this->success('登录成功！', U('./User/Index/Index'));
            }
            if($_POST['type']==2){
                $users=$org->where($map)->find();
                if(!$users){
                    $this->error('帐号不存在或被禁用');
                }
                if($users['password'] != md5($password)){
                    $this->error('密码错误');
                }
                if($users['state']!=0){
                    /* 记录登录SESSION */
                    session('name',$users['name']);
                    session('type','2');
                    session('username',$users['username']);
                    $this->success('登录成功！即将转入组织控制台.', U('./Orgs/Index/Index'));
                }else{
                    $this->error('请等待账号审核');
                }

            }
            if($_POST['type']==3){
                $users=$admin->where($map)->find();
                if(!$users){
                    $this->error('帐号不存在或被禁用');
                }
                if($users['password'] != md5($password)){
                    $this->error('密码错误');
                }
                /* 记录登录SESSION */
                session('name',$users['name']);
                session('type','3');
                session('username',$users['username']);
                $this->success('登录成功！即将转入管理后台.', U('./Admin/Index/Index'));
            }
        }else{
            if($_SESSION['type']==1){
                $this->redirect('./User/Index/Index');
            }elseif($_SESSION['type']==2){
                $this->redirect('./Orgs/Index/Index');
            }elseif($_SESSION['type']==3){
                $this->redirect('./Admin/Index/Index');
            }
            $this->display();
        }
    }
    public function reg1($username=0,$password=0,$repassword=0,$name=0,$mobile=0){
        if($password==$repassword){
            $user = M('user');
            $data ['username'] = $username;
            $data ['password'] = md5($password);
            $data ['name'] = $name;
            $data ['mobile'] = $mobile;
            if ($user->create($data)) {
                $result = $user->add($data);
                if ($result) {
                    $this->success('个人用户注册成功',U('Public/Login'));
                } else {
                    $this->error('注册失败');
                }
            } else {
                $this->error($user->getError());
            }
        }else{
            $this->error('两次密码输入不同,请重新输入');
        }
    }
    public function reg2($username=0,$password=0,$repassword=0,$name=0,$mobile=0,$intro=0){
        if($password==$repassword){
            $user = M('org');
            $data ['username'] = $username;
            $data ['password'] = md5($password);
            $data ['name'] = $name;
            $data ['mobile'] = $mobile;
            $data ['intro'] = $intro;
            $data ['state'] = 0;
            if ($user->create($data)) {
                $result = $user->add($data);
                if ($result) {
                    $this->success('组织用户注册成功',U('Public/Login'));
                } else {
                    $this->error('注册失败');
                }
            } else {
                $this->error($user->getError());
            }
        }else{
            $this->error('两次密码输入不同,请重新输入');
        }
    }
    public function logout(){
        if($_SESSION['name']!=NULL){
            session("names",null);
            session('username', null);
            session('type',null);
            session('name', null);
            session('[destroy]');
            $this->success('退出成功！', U('Login'));
        } else {
            $this->redirect('Login');
        }
    }
}