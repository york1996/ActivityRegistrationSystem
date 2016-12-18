<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/4/24
 * Time: 15:20
 */
namespace Admin\Controller;
use Think\Controller;
class OrgController extends Controller {
    public function index(){
        $Student = M('org'); // 实例化User对象
        $count      = $Student->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Student->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function add(){
        $Student = M('org');
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);
        $data['name'] = $_POST['name'];
        $data['mobile'] = $_POST['mobile'];
        $data['intro'] = $_POST['intro'];
        $data['state'] = 1;
        if ($Student->create($data)) {
            $result = $Student->add($data);
            if ($result) {
                $this->success('添加成功',U('Org/Index'));
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->error($Student->getError());
        }
    }
    public function del(){
        $Student = M('org');
        if($Student->where('id="'.$_GET['id'].'"')->delete()){
            $this->success('删除成功',U('Org/index'));
        }
        else{
            $this->error('删除失败');
        }
    }
    public function edit(){
        $Student = M('org');
        $id=(int)$_GET['id'];
        $list=$Student->where("id=$id")->find();
        $this->assign('vo',$list);
        $this->display();
    }
    public function update(){
        $Student = M('org');
        $data['id'] = $_POST['id'];
        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);
        $data['name'] = $_POST['name'];
        $data['mobile'] = $_POST['mobile'];
        $data['intro'] = $_POST['intro'];
        if($Student->create($data)){
            $result =   $Student->save($data);
            if($result){
                $this->success('操作成功！',U('Org/index'));
            }
            else{
                $this->error('操作失败! 内容没有改变.');
            }
        }else{
            $this->error($Student->getError());
        }
    }
    public function off($id=0){
        $Active=M('org');
        if($Active->where("id=$id")->setField('state','0')){
            $this->success("关闭成功");
        }else{
            $this->error("失败");
        }
    }
    public function on($id=0){
        $Active=M('org');
        if($Active->where("id=$id")->setField('state','1')){
            $this->success("审核成功");
        }else{
            $this->error("失败");
        }
    }

}