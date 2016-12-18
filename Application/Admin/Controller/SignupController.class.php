<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/4/24
 * Time: 12:40
 */
namespace Admin\Controller;
use Think\Controller;
class SignupController extends Controller {
    public function index(){
        $Active = M('active');
        $now = NOW_TIME;
        $count      = $Active->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Active->where("state=1")->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('now',$now);
        $this->display();
    }

    public function info($id=0){
        $Active = M('active');
        $Tc = M('tc');
        $count      = $Tc->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $Tc->where("classify=$id")->order('time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data = $Active->where("id=$id")->find();
        $this->assign('people',$Tc->where("classify=$id")->count());
        $this->assign('data',$data);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function off($id=0){
        $Active=M('tc');
        if($Active->where("id=$id")->setField('state','0')){
            $this->success("关闭成功");
        }else{
            $this->error("失败");
        }
    }
    public function on($id=0){
        $Active=M('tc');
        if($Active->where("id=$id")->setField('state','1')){
            $this->success("审核成功");
        }else{
            $this->error("失败");
        }
    }
}