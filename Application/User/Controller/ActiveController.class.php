<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/4/30
 * Time: 22:26
 */
namespace User\Controller;
use Think\Controller;
class ActiveController extends Controller {
    public function index(){
        $Active = M('Active');
        $count      = $Active->count();
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Active->where("state=1")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('now',NOW_TIME);
        $this->display();
    }

    public function sign(){
        $tc=M('tc');
        $classify=$data['classify']=$_POST['classify'];
        $data['title']=$_POST['title'];
        $username = $data['username'] = $_POST['username'];
        $data['name']=$_POST['name'];
        $data['mobile']=$_POST['mobile'];
        $data['content']=$_POST['content'];
        $data['wechat']=$_POST['wechat'];
        $data['time']=NOW_TIME;
        $data['org'] = $_POST['org'];
        $data['state']=0;
        if($tc->where("username='$username' AND classify=$classify")->select()){
            $this->error('您已经报过名啦~请不要重复报名~',U('Active/Index'));
        }
        if(IS_POST){
            if ($tc->create($data)) {
                $result = $tc->add($data);
                if ($result) {
                    $this->success('报名成功',U('Active/Index'));
                } else {
                    $this->error('报名失败');
                }
            } else {
                $this->error($tc->getError());
            }
        }
    }
}