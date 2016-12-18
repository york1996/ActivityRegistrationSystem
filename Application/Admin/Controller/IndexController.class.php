<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function ueditor(){
        $data = new \Org\Util\Ueditor();
        echo $data->output();
    }
    public function index(){
        if($_SESSION['type']!=3){
            $this->error('您没有权限访问后台',U('./Home/Index'));
        }
        $news = M('news');
        $user = M('user');
        $admin = M('admin');
        $org = M('org');
        $count = $news->count();
        $count1 = $user->count();
        $count2= $admin->count();
        $count3 = $org->count();
        $this->assign('vo',$count);
        $this->assign('no',$count1);
        $this->assign('so',$count2);
        $this->assign('wo',$count3);
        $this->display();
    }
}