<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if($_SESSION['type']!=1){
            $this->error('您没有权限访问个人中心',U('./Home/Index/Index'));
        }
        $news = M('active');
        $user = M('user');
        $org = M('org');
        $tc = M('tc');
        $count = $news->count();
        $count1 = $user->count();
        $count2 = $tc->count();
        $count3 = $org->count();
        $this->assign('vo',$count);
        $this->assign('no',$count1);
        $this->assign('wo',$count3);
        $this->assign('co',$count2);
        $this->display();
    }
}