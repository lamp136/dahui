<?php
namespace app\home\controller;
use think\Db;
use think\Paginator;
use think\Controller;

/***********文章类************/
class Article extends Base
{
	/**
	 * 文章列表
	 */
	public function index(){

		$cateId = input('cid');
		$catData= Db::name('article_cate')->where('id',$cateId)->find();

		//网站头部选中的标记
		$flagHead = $cateId ;
		if($cateId != config('news_center')&&$cateId != config('cemetery_dynaminc')){
			$flagHead = $catData['pid'];
		}
			
		//查询搜索分类
		$cateWhere['status'] = config('normal_status');
		$cateWhere['pid'] = $catData['id'];
		$crumbs = '新闻中心';
		if($catData['pid'] != 0){
			$cateWhere['pid'] = $catData['pid'];
		}

		$category = Db::name('article_cate')->where($cateWhere)->order('orderby desc,id asc')->field('id,pid,name,orderby')->select();
		//查询文章列表 如果是一级分类 新闻中心默认新闻资讯分类, 关于陵园默认陵园简介分类
		if($cateId == config('news_center')){
			$cateId = config('news');
		}

		$data = $this->getArticle($cateId);
		foreach ($data as $k => $v) {
			$data[$k]['create_time'] = date('Y-m-d',$v['create_time']);
		}

		//面包屑
		foreach ($category as $key => $value) {
			if($value['id'] == $cateId){
				$end_crumbs = $value['name'];
			}
		}	

		$this->assign('data',$data);
		$this->assign('cate_id',$cateId);
		$this->assign('category',$category);
		$this->assign('end_crumbs',$end_crumbs);
		$this->assign('crumbs',$crumbs);
		$this->assign('title',config('web_name').'/'.'文章首页');
		$this->assign('flag_head',$flagHead);
		return $this->fetch();
	}

	/**
	 * 获取文章列表tab切换
	 */
	public function getList(){
		$cateId = input('cid');
		$result = array('code'=>0,'msg'=>'失败');
		if($cateId){
			$data = $this->getArticle($cateId);
			foreach ($data as $key => $value) {
				$data[$key]['create_time'] = date('Y-m-d',$value['create_time']);
				$data[$key]['title'] = msubstr($value['title'],0,20);
			}

			$result = array('code'=>200,'data'=>$data);
		}
		echo json_encode($result);
	}

	/**
	 * 文章详情
	 * @return [type] [description]
	 */
	public function detail(){
		$id = input('id');
		$article = Db::name('article')->where('id',$id)->field('id,title,cate_id,content')->find();
		$cate = Db::name('article_cate')->where('id',$article['cate_id'])->field('id,pid,name')->find();
		$where['status'] = config('normal_status');
		$where['pid'] = $cate['pid'];
		$category = Db::name('article_cate')->where($where)->field('id,pid,name,orderby')->order('orderby desc,id asc')->select();
		
		$flagHead = $cate['id'];
		if($cate['id'] != config('news_center') && $cate['id'] != config('cemetery_dynaminc')){
			$flagHead = $cate['pid'];
		}

		$crumbs = '新闻中心';
		$this->assign('title',config('web_name').'/'.'文章详情');
		$this->assign('article',$article);
		$this->assign('category',$category);
		$this->assign('crumbs',$crumbs);
		$this->assign('cate',$cate);
		$this->assign('flag_head',$flagHead);
		return $this->fetch();
	}

	/**
	 * 关于陵园
	 */
	public function aboutCemetery(){
		$cid = input('cid');
		if($cid == config('about_cemetery')){
			$cid = config('cemetery_synopsis');
		}
		$article = Db::name('article')->where('cate_id',$cid)->field('id,title,cate_id,content')->find();

		$cate = Db::name('article_cate')->where('id',$cid)->field('id,pid,name')->find();

		$where['status'] = config('normal_status');
		$where['pid'] = $cate['pid'];
		$category = Db::name('article_cate')->where($where)->field('id,pid,name,orderby')->order('orderby desc,id asc')->select();

		$flagHead = $cate['id'];
		if($cid != config('about_cemetery') && $cid != config('call_me')){
			$flagHead = $cate['pid'];
		}

		$crumbs = '关于陵园';
		$this->assign('title',config('web_name').'/'.'文章详情');
		$this->assign('article',$article);
		$this->assign('category',$category);
		$this->assign('crumbs',$crumbs);
		$this->assign('cate',$cate);
		$this->assign('flag_head',$flagHead);
		return $this->fetch();

	}
}