<?php

namespace app\home\controller;
use app\home\model\BaseModel;
use think\Controller;
use think\Db;

class Base extends Controller
{
    public function _initialize()
    {
       
    	$model = new BaseModel();
        //轮播图获取
    	$banner = $model->getBanner();

        //联系方式获取
        $config = $model->webMessage();
        $webMessage = [];
        foreach ($config as $k => $v) {
            $webMessage[trim($v['name'])] = $v['value'];
        }
        $webMessage['web_tel']  = explode('#',$webMessage['web_tel']);
       
        $this->assign('webMessage',$webMessage);
        $this->assign('banner', $banner);

    }

    /**
     * 获取文章
     * @param  [type] $cid   分类id
     * @param  [type] $limit 去多少数据
     * @return [type]        
     */
    public function getArticle($cid,$limit=''){
    	$where['cate_id'] = $cid;
    	$where['status'] = config('normal_status');
    	$res = Db::name('article')->where($where)->order('sort desc,id desc')->limit($limit)->select();
    	return $res;
    }
}