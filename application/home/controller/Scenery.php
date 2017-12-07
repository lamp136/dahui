<?php
namespace app\home\controller;
use think\Db;

/***********陵园风景类************/
class Scenery extends Base
{
	/**
	 * 风景列表
	 * @return [type] [description]
	 */
	public function index(){
		$cid = input('cid');
		$category = Db::name('scenery_cate')->where('status',config('normal_status'))->field('id,name,status')->order('sort desc,id desc')->select();
		$defaultCate = $category[0];

		if($cid){			
			foreach ($category as $key => $value) {
				if($value['id'] == $cid){
					$defaultCate = $category[$key];
				}
			}
		}

		
		$data = Db::name('scenery')->where('cate_id',$defaultCate['id'])->field('id,cate_id,sname,sort,photo')->order('sort desc,id desc')->select();
		
		$this->assign('category',$category);
		$this->assign('defaultCate',$defaultCate);
		$this->assign('data',$data);
		$this->assign('title',config('web_name').'/'.'陵园风景');
		$this->assign('flag_head','scenery');
		return $this->fetch();
	}

	/**
	 * tab切换获取分类列表和风景列表
	 * @return [type] [description]
	 */
	public function getList(){
		$cid = input('cid');
		$result = array('code'=>0,'msg'=>'失败');
		$data = Db::name('scenery')->where('cate_id',$cid)->field('id,cate_id,sname,sort,photo')->order('sort desc,id desc')->select();
		if($data){
			$result = array('code'=>200,'data'=>$data);
		}

		echo json_encode($result);
	}

	/**
	 * 陵园风景详情页
	 */
	public function detail(){
		$id = input('id');
		$data = Db::name('scenery')->where('id',$id)->field('id,cate_id,content,sname,price,material,orientation,size,acupoint')->find();

		$category = Db::name('scenery_cate')->where('status',config('normal_status'))->order('sort desc,id desc')->field('id,name')->select();
		foreach ($category as $key => $value) {
			if($value['id'] == $data['cate_id']){
				$cate = $category[$key];
			}
		}

		$this->assign('data',$data);
		$this->assign('cate',$cate);
		$this->assign('category',$category);
		$this->assign('title',config('web_name').'/'.'陵园风景详情');
		$this->assign('flag_head','scenery');
		return $this->fetch();
	}
}