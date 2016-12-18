<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/4/27
 * Time: 20:12
 */
namespace Orgs\Controller;
use Think\Controller;
class SignupController extends Controller{
    public function index(){
        $Active = M('active');
        $name = $_SESSION['name'];
        $now = NOW_TIME;
        $count      = $Active->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Active->where("org='$name' AND state=1")->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
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
        $this->assign('class',$id);
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

    public function read($filename,$encode='utf-8'){
        $objReader = \PHPExcel_IOFactory::createReader(Excel5);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filename);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
        return $excelData;
    }

    //导出
    public function excel_runexport($id=0){
        $data= M('tc')->where("classify=$id AND state=1")->select();

        import("Org.Util.PHPExcel");
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        $objPHPExcel = new \PHPExcel();
        import("Org.Util.PHPExcel.Reader.Excel5");
        /*设置excel的属性*/
        $objPHPExcel->getProperties()->setCreator("itsu")//创建人
        ->setLastModifiedBy("itsu")//最后修改人
        ->setTitle("数据EXCEL导出")//标题
        ->setSubject("数据EXCEL导出")//题目
        ->setDescription("功能示例")//描述
        ->setKeywords("excel")//关键字
        ->setCategory("result file");//种类

        //第一行数据
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '姓名')
            ->setCellValue('B1','手机')
            ->setCellValue('C1', '报名时间')
            ->setCellValue('D1', '备注');

        foreach($data as $k => $v){
            $k=$k+1;
            $num=$k+1;//数据从第二行开始录入

            $objPHPExcel->setActiveSheetIndex(0)
                //Excel的第A列，uid是你查出数组的键值，下面以此类推
                ->setCellValue('A'.$num, $v['name'])
                ->setCellValue('B'.$num, $v['mobile'])
                ->setCellValue('C'.$num, date("Y-m-d",$v['time']));

        }
        $objPHPExcel->getActiveSheet()->setTitle('User');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.time().'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
}