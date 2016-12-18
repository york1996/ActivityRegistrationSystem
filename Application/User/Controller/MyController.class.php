<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/5/1
 * Time: 15:02
 */
namespace User\Controller;
use Think\Controller;
class MyController extends Controller {
    public function index(){
        $username = $_SESSION['username'];
        $Active = M('tc');
        $count      = $Active->count();
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Active->where("username='$username'")->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('now',NOW_TIME);
        $this->display();
    }
}