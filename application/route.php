<?php

return [

    '/'                    => 'home/Index/index',//网站首页
    'article/[:cid]$'      => ['home/Article/index',['method' => 'get'],['id' => '\d+']],//新闻列表页 
    'article/detail/[:id]$'       => ['home/Article/detail',['method' => 'get'],['id' => '\d+']],//新闻详情页
    'article/about/[:cid]$'       => ['home/Article/aboutCemetery',['method' => 'get'],['id' => '\d+']],//关于陵园详情

    'scenery/[:cid]$'            => 'home/Scenery/index',  //陵园风景列表页
    'scenery/detail/:id$'        => ['home/Scenery/detail',['method' => 'get'],['id' => '\d+']], //陵园风景详情页
    'tomb/[:cid]$'            => 'home/Tomb/index',  //墓型列表页
    'tomb/detail/:id$'        => ['home/Tomb/detail',['method' => 'get'],['id' => '\d+']], //墓型详情页
    'product/[:cid]$'            => 'home/Product/index',  //墓型列表页
    'product/detail/:id$'        => ['home/Product/detail',['method' => 'get'],['id' => '\d+']], //

];
