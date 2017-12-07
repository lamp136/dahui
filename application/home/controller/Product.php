<?php
namespace app\home\controller;
use think\Db;

/***********产品及服务类************/
class Product extends Base
{
	/**
	 * 产品及服务列表
	 * @return [type] [description]
	 */
	public function index(){
		$cid = input('cid');
		$category = Db::name('product_cate')->where('status',config('normal_status'))->field('id,name,status')->order('sort desc,id desc')->select();
		$defaultCate = $category[0];

		if($cid){			
			foreach ($category as $key => $value) {
				if($value['id'] == $cid){
					$defaultCate = $category[$key];
				}
			}
		}

		
		$data = Db::name('product')->where('cate_id',$defaultCate['id'])->field('id,cate_id,product_name,sort,photo')->order('sort desc,id desc')->select();
		
		$this->assign('category',$category);
		$this->assign('defaultCate',$defaultCate);
		$this->assign('data',$data);
		$this->assign('title',config('web_name').'/'.'产品及服务');
		$this->assign('flag_head','product');
		return $this->fetch();
	}

	/**
	 * tab切换获取分类列表和产品及服务列表
	 * @return [type] [description]
	 */
	public function getList(){
		$cid = input('cid');
		$result = array('code'=>0,'msg'=>'失败');
		$data = Db::name('product')->where('cate_id',$cid)->field('id,cate_id,product_name,sort,photo')->order('sort desc,id desc')->select();
		if($data){
			$result = array('code'=>200,'data'=>$data);
		}

		echo json_encode($result);
	}

	/**
	 * 产品及服务详情页
	 */
	public function detail(){
		$id = input('id');
		$data = Db::name('product')->where('id',$id)->field('id,cate_id,content,product_name,price')->find();

		$category = Db::name('product_cate')->where('status',config('normal_status'))->order('sort desc,id desc')->field('id,name')->select();
		foreach ($category as $key => $value) {
			if($value['id'] == $data['cate_id']){
				$cate = $category[$key];
			}
		}

		$this->assign('data',$data);
		$this->assign('cate',$cate);
		$this->assign('category',$category);
		$this->assign('title',config('web_name').'/'.'产品及服务详情');
		$this->assign('flag_head','product');
		return $this->fetch();
	}
}