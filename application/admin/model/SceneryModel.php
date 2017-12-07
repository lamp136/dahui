<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class SceneryModel extends Model
{
    protected $name = 'scenery';

    /**
     * 根据搜索条件获取陵园风景列表信息
     */
    public function getSceneryByWhere($map, $Nowpage, $limits)
    {
        return Db::name($this->name)->field('think_scenery.*,name')->join('think_scenery_cate', 'think_scenery.cate_id = think_scenery_cate.id')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
    
    
    /**
     * [insertArticle 添加风景]
     */
    public function insertScenery($param)
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
     * [updateScenery 编辑风景]
     */
    public function updateScenery($param)
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
    public function getOneScenery($id)
    {
        return $this->where('id', $id)->find();
    }

}