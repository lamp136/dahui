<?php 
namespace app\admin\model;
use think\Db;
use think\Model;

class FriendlinkModel extends Model
{
	/**
	 * 查询友情链接数据列表
	 * @param  [array] $where  查询条件
	 * @param  [int] $nowPage  当前页
	 * @param  [int] $limit    每页显示的数据
	 * @return [array]         
	 */
	public function getFriendAll($where,$nowPage,$limit){
		$res = Db::name('friendlink')->field('id,name,url,status,created_time')->order('sort desc,id desc')->where($where)->page($nowPage,$limit)->select();
		return $res;
	}

	/**
     * 插入信息
     * @param $param
     */
    public function insertFriend($param)
    {
        try{
            $result = Db::name('friendlink')->insert($param);
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
     * 根据id查询数据
     * @param  [int] $id  要编辑的id
     * @return [arr]     
     */
    public function getOneFriend($id)
    {
        return Db::name('friendlink')->where('id', $id)->find();
    }

    /**
     * 保存编辑
     */
    public function editFriend($param){
    	try{
            $result = Db::name('friendlink')->where('id',$param['id'])->update($param);
            if(false === $result){       
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '修改成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
}