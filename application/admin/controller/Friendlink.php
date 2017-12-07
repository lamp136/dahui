<?php 
namespace app\admin\controller;
use app\admin\model\FriendlinkModel;
use think\Db;

//友情链接类
class Friendlink extends Base
{
	/**
	 * 列表页
	 */
	public function index(){
		$key = input('key');
        $map = [];
        $map['status'] = array('neq',config('delete_status'));
        if($key&&$key!=="")
        {
            $map['name'] = ['like',"%" . $key . "%"];          
        }             
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db('friendlink')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $Friend = new FriendlinkModel();
        $lists = $Friend->getFriendAll($map, $Nowpage, $limits); 
        foreach($lists as $k=>$v)
        {
            $lists[$k]['created_time']=date('Y-m-d H:i:s',$v['created_time']);
        }       
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
	}

	/**
	 * 添加友情链接
	 */
	public function add_friendlink(){
		if(request()->isAjax()){   
		 	$param = input('post.');     
            $param['created_time'] = time();
            $param['updated_time'] = time();
            $Friend = new FriendlinkModel();
            $flag = $Friend->insertFriend($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        return $this->fetch();
	}

	/**
	 * 编辑友情链接
	 */
	public function edit_friendlink(){
		$Friend = new FriendlinkModel();
        if(request()->isAjax()){
            $param = input('post.');
            $param['updated_time'] = time();
            $flag = $Friend->editFriend($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('id');
        $this->assign([
            'data' => $Friend->getOneFriend($id)
        ]);
        return $this->fetch();
	}

	/**
	 * 删除数据
	 * @return [type] 
	 */
	public function del_friendlink()
    {
        $id = input('id');
        $flag = Db::name('friendlink')->where('id',$id)->setField(['status'=>config('delete_status')]);
        return json(['code' => 1, 'data' => $flag['data'], 'msg' => '删除成功']);
        
    }

	/**
	 * 修改状态
	 * @return [type] [description]
	 */
	public function friend_state()
    {
        $id = input('id');
        $status = Db::name('friendlink')->where('id',$id)->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('friendlink')->where('id',$id)->setField(['status'=>config('close_status')]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('friendlink')->where('id',$id)->setField(['status'=>config('normal_status')]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }
}