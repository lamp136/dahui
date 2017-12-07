<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class TombModel extends Model
{
    protected $name = 'tomb';

    /**
     * 根据搜索条件获取墓型列表信息
     */
    public function getTombByWhere($map, $Nowpage, $limits)
    {
        return Db::name($this->name)->field('think_tomb.*,name')->join('think_tomb_cate', 'think_tomb.cate_id = think_tomb_cate.id')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
    
    
    /**
     * [insertArticle 添加墓型]
     */
    public function insertTomb($param)
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
     * [updateScenery 编辑墓型]
     */
    public function updateTomb($param)
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
    public function getOneTomb($id)
    {
        return $this->where('id', $id)->find();
    }

}