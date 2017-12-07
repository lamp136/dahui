<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ProductModel extends Model
{
    protected $name = 'product';

    /**
     * 根据搜索条件获取陵园风景列表信息
     */
    public function getProductByWhere($map, $Nowpage, $limits)
    {
        return Db::name($this->name)->field('think_product.*,name')->join('think_product_cate', 'think_product.cate_id = think_product_cate.id')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
    
    
    /**
     * [insertProduct 添加产品服务]
     */
    public function insertProduct($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [updateProduct 编辑产品服务]
     */
    public function updateProduct($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){          
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getOneScenery 根据id获取一条信息]
     */
    public function getOneProduct($id)
    {
        return $this->where('id', $id)->find();
    }

}