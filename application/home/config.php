<?php

return [

	// 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
     'route_config_file' =>  ['route'],   // 设置路由配置文件列表

    //模板参数替换
    'view_replace_str' => array(
        '__CSS__' => '/static/home/css',
        '__JS__'  => '/static/home/js',
        '__IMG__' => '/static/home/images',
		
    ),

    //首页轮播图分类
    'banner_cate' => 27,
    'index_ad_right'=> 28,

    //文章分类
    'news_center' => 1,          //新闻中心
    'about_cemetery' => 2,      //关于陵园
    'news' => 5,               //新闻资讯
    'trends' => 3,             //行业动态
    'cemetery_dynaminc' => 4,  //陵园动态
    'fengshui' => 7,           //风水文化
    'funeral_knowledge' => 8,  //殡葬知识
    'cemetery_synopsis' => 9,  //陵园简介
    'corporate_culture' => 10, //企业文化
    'notice'  => 11,           //通知公告
    'call_me' => 12,           //联系我们
    'service_advantage' => 13, //服务优势
    'buying_tombs' => 14,      //购墓流程

    'web_name' => '大惠陵园',

];
