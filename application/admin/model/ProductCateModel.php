<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ProductCateModel extends Model
{
    protected $name = 'product_cate';
    
    /**
     * [getAllCate 获取全部分类]
     */
    public function getAllCate()
    {
        return Db::name($this->name)->where('status !='.config('delete_status'))->order('id asc')->select();       
    }


    /**
     * [insertCate 添加分类]
     */
    public function insertCate($param)
    {
        try{
            $result = Db::name($this->name)->insert($param);
            if(false === $result){     
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '分类添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [editMenu 编辑分类]
     */
    public function editCate($param)
    {
        try{
            $result = Db::name($this->name)->update($param);
            if(false === $result){          
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '分类编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getOneMenu 根据分类id获取一条信息]
     * @return [type] [description]
     */
    public function getOneCate($id)
    {
        return Db::name($this->name)->where('id', $id)->find();
    }


}