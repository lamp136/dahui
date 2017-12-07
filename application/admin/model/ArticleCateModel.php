<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ArticleCateModel extends Model
{
    protected $name = 'article_cate';


    /**
     * [getAllCate 获取全部分类]
     * @author [田建龙] [864491238@qq.com]
     */
    public function getAllCate($where)
    {
        return Db::name($this->name)->where($where)->order('id asc')->select();       
    }


    /**
     * [insertCate 添加分类]
     * @author [田建龙] [864491238@qq.com]
     */
    public function insertCate($param)
    {
        try{
            $result = $this->save($param);
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
     * [editCate 编辑分类]
     * @author [田建龙] [864491238@qq.com]
     */
    public function editCate($param)
    {
        try{
            $result = $this->save($param, ['id' => $param['id']]);
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
     * [getOneCate 根据分类id获取一条信息]
     * @return [type] [description]
     */
    public function getOneCate($id)
    {
        return $this->where('id', $id)->find();
    }

}