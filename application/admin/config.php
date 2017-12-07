<?php

return [
    //模板参数替换
    'view_replace_str' => array(
        '__CSS__' => '/static/admin/css',
        '__JS__'  => '/static/admin/js',
        '__IMG__' => '/static/admin/images',		
    ),

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

    /************ 图片相关的配置 *********************/
    'max_size'    =>  '3M',
    'ext'         =>  "jpg,jpeg,pjpeg,gif,png,bmp",
    'root_path'   => '/public/uploads/images/',
    'public_path' => '/public',
    'img_host'    =>  '/uploads/images',

    //图片尺寸
    'index_ad' => [
        27 => '1910*518',   //首页banner图
        28 => '278*301',    //首页右侧广告位
    ],
    'product_size' => '199*199', //产品,墓型,景观
];
