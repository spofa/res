<?php

/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2016/1/25
 * Time: 10:12
 */

namespace Common\Model;

/**
 * 引用文件
 */
use Think\Model;

class InterviewModel extends Model
{
    public $model;
    public function _initialize()
    {
        $this->model = M('Interview');
    }
    protected $_validate=array(
        array('interview_name','require','请输入名称！'),
        array('interview_tel','require','请输入电话！'),
    );
    //查询列表
    public function GetList($conditon = "",$order="interview_id desc",$field = "*",$size="10"){
        $result = $this->model->where($conditon)->field($field)->order($order)->limit($size)->page($page)->select();
        return $result;
    }
    //单个查找
    public function GetOne($conditon = "",$field = "*"){
        $result = $this->model->where($conditon)->field($field)->find();
        return $result;
    }
    //添加
    public function AddData($data){
        $result = $this->model->data($data)->add();
        return $result;
    }
    //修改
    public function SaveData($where,$data){
        $result = $this->model->where($where)->data($data)->save();
        return $result;
    }

    //删除
    public function DelData($where){
        $result = $this->model->where($where)->delete();
        return $result;
    }
}

?>