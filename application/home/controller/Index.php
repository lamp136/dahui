<?php
namespace app\home\controller;
use app\home\model\IndexModel;
use think\Db;

class Index extends Base
{

    public function index(){

        $news = $this->getArticle(config('news'),8); //新闻资讯
        $notice = $this->getArticle(config('notice'),1); //通知公告
        $lyjj = $this->getArticle(config('cemetery_synopsis'),1); //陵园简介
        $qywh = $this->getArticle(config('corporate_culture'),1);  //企业文化
        $funeral = $this->getArticle(config('funeral_knowledge'),8); //殡葬知识
        $fengshui= $this->getArticle(config('fengshui'),8);         //风水文化
        $service = $this->getArticle(config('service_advantage'),1); //服务优势

        //墓型展示
        $tombWhere['status'] = config('normal_status');
        $tomb = Db::name('tomb')->where($tombWhere)->order('is_recommend desc,id desc')->limit(8)->field('id,tomb_name,photo')->select();
        
        //产品服务
        $product = Db::name('product')->where('status',config('normal_status'))->order('is_recommend desc,id desc')->limit(8)->field('id,product_name,photo')->select();

        //友情链接
        $link = Db::name('friendlink')->where('status',config('normal_status'))->order('sort desc,id desc')->field('name,url')->select();

        //获取广告位
        $adWhere['status'] = config('normal_status');
        $adWhere['closed'] = config('default_status');
        $adWhere['ad_position_id'] = config('index_ad_right');
        $ad = Db::name('ad')->where($adWhere)->find();

        //景观
        $scenery = Db::name('scenery')->where('status',config('normal_status'))->order('sort desc,id desc')->find();

        $this->assign('scenery',$scenery);
        $this->assign('ad',$ad);
        $this->assign('link',$link);
        $this->assign('service',$service);
        $this->assign('product',$product);
        $this->assign('tomb',$tomb);
        $this->assign('news',$news);
        $this->assign('notice',$notice);
        $this->assign('lyjj',$lyjj);
        $this->assign('qywh',$qywh);
        $this->assign('funeral',$funeral);
        $this->assign('fengshui',$fengshui);
        $this->assign('title',config('web_name').'/'.'首页');
        $this->assign('flag_head','');
        return $this->fetch();

    }

}
