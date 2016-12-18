<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/3/29
 * Time: 13:10
 */
namespace Admin\Controller;
use Think\Controller;
class ActiveController extends Controller {

    public function index(){
        $Active = M('Active');
        $count      = $Active->count();
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Active->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function add(){
        $Active = M('Active');
        if(IS_POST){
            $data['title'] = $_POST['title'];
            $data['org'] = $_POST['org'];
            $data['content']= $_POST['content'];
            $data['time'] = strtotime($_POST['time']);
            $data['state'] = 1;
            if ($Active->create($data)) {
                $result = $Active->add($data);
                if ($result) {
                    $this->success('发布成功',U('Active/Index'));
                } else {
                    $this->error('发布失败');
                }
            } else {
                $this->error($Active->getError());
            }
        }else{
            $this->display();
        }

    }

    public function del($id=0){
        $Article = M('Active');
        if($Article->where("id=$id")->delete()){
            $this->success('删除成功',U('Active/Index'));
        }
        else{
            $this->error('删除失败');
        }
    }

    public function edit($id=0){
        $Active = M('Active');
        if(IS_POST){
            $data['id'] = $_POST['id'];
            $data['title'] = $_POST['title'];
            $data['org'] = $_POST['org'];
            $data['content']= $_POST['content'];
            $data['time'] = strtotime($_POST['time']);
            $data['state'] = 1;
            if($Active->create($data)){
                $result =   $Active->save($data);
                if($result){
                    $this->success('操作成功！');
                }
                else{
                    $this->error('操作失败!请作出修改!');
                }
            }else{
                $this->error($Active->getError());
            }
        }else{
            $list=$Active->where("id=$id")->find();
            $this->assign('vo',$list);
            $this->assign('title','显示用户编辑信息');
            $this->display();
        }
    }

    public function off($id=0){
        $Active=M('active');
        if($Active->where("id=$id")->setField('state','0')){
            $this->success("关闭成功");
        }else{
            $this->error("失败");
        }
    }
    public function on($id=0){
        $Active=M('active');
        if($Active->where("id=$id")->setField('state','1')){
            $this->success("审核成功");
        }else{
            $this->error("失败");
        }
    }
}