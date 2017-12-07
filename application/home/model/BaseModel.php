<?php

namespace app\home\model;
use think\Model;
use think\Db;

class BaseModel extends Model
{
  
    /**
     * [getAllCate 获取首页轮播]
     */
    public function getBanner()
    {
    	$where['ad_position_id'] = config('banner_cate');
        $where['status'] = config('normal_status');
    	$where['closed'] = config('default_status');
        return Db::name('ad')->where($where)->field('id,title,link_url,images')->select();       
    }

    /**
     * 联系方式及网站信息
     */
    public function webMessage(){
    	return Db::name('config')->select();
    }



}