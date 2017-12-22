<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:74:"D:\wamp\www\project\web\public/../application/home\view\article\index.html";i:1512095276;s:73:"D:\wamp\www\project\web\public/../application/home\view\public\title.html";i:1512460328;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\header.html";i:1512633002;s:78:"D:\wamp\www\project\web\public/../application/home\view\public\contactWay.html";i:1512702070;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\footer.html";i:1512697646;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\linkjs.html";i:1512110520;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="__CSS__/screen.css" />
<link rel="stylesheet" href="__CSS__/iconfont.css" />
<!-- 轮播图样式slide.css -->
<link rel="stylesheet" type="text/css" href="__CSS__/slide.css"/>
<script type="text/javascript" src="__JS__/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="__CSS__/swiper.min.css" />
<script src="__JS__/swiper.min.js"></script>
	</head>
	<body>
		<!--navbar_top 顶部-->
		<!--右侧电话-->
     <div class="right_tel">
        <img src="__IMG__/index-tel.jpg" alt="" />
    </div>
<!--右侧电话  end -->
<!--navbar_top 顶部-->
<div class="navbar_top">
	<div class="contain">
		<div class="navbar_left">
			<span>欢迎您来到云南大惠陵园官方网站</span>
		</div>
		<div class="navbar_right">
			<ul>
				<li><a href="javascript:void(0);">服务热线：</a></li>
				<li><a href="javascript:void(0);"><?php if(!(empty($webMessage['web_tel'][0]) || (($webMessage['web_tel'][0] instanceof \think\Collection || $webMessage['web_tel'][0] instanceof \think\Paginator ) && $webMessage['web_tel'][0]->isEmpty()))): ?><?php echo $webMessage['web_tel']['0']; endif; ?></a></li>
				<li><a href="javascript:void(0);"><?php if(!(empty($webMessage['web_tel'][1]) || (($webMessage['web_tel'][1] instanceof \think\Collection || $webMessage['web_tel'][1] instanceof \think\Paginator ) && $webMessage['web_tel'][1]->isEmpty()))): ?><?php echo $webMessage['web_tel']['1']; endif; ?></a></li>
			</ul>
		</div>
	</div>
</div><!--navbar_top 顶部 end-->
<!-- 导航 -->
<div class="nav">
    <div class="contain">
        <ul>
            <li <?php if(empty($flag_head) || (($flag_head instanceof \think\Collection || $flag_head instanceof \think\Paginator ) && $flag_head->isEmpty())): ?> class="lineheight" <?php endif; ?>>
                <a href="/">网站首页</a>
            </li>
            <li <?php if($flag_head == config('about_cemetery')): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Article/aboutCemetery',array('cid'=>config('about_cemetery'))); ?>"">关于陵园</a>
            </li>
            <li <?php if($flag_head == config('cemetery_dynaminc')): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Article/index',array('cid'=>config('cemetery_dynaminc'))); ?>">陵园动态</a>
            </li>
            <li <?php if($flag_head == 'scenery'): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Scenery/index'); ?>">陵园景观</a>
            </li>
            <li class="nav_img"><img src="__IMG__/index-logo.jpg" alt="" /></li>
            <li <?php if($flag_head == 'tomb'): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Tomb/index'); ?>">墓型展示</a>
            </li>
            <li <?php if($flag_head == 'product'): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Product/index'); ?>">产品服务</a>
            </li>
            <li <?php if($flag_head == config('news_center')): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Article/index',array('cid'=>config('news_center'))); ?>">新闻中心</a>
            </li>
            <li <?php if($flag_head == config('call_me')): ?> class="lineheight" <?php endif; ?>>
                <a href="<?php echo url('home/Article/aboutCemetery',array('cid'=>config('call_me'))); ?>">联系我们</a>
            </li>
        </ul>
    </div><!-- contain End -->
</div><!-- nav 导航 End -->
<!--banner部分-->
<div class="main_visual">
    <div class="flicking_con">
        <div class="flicking_inner">
        	<?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): if( count($banner)==0 ) : echo "" ;else: foreach($banner as $key=>$vo): ?> 
            	<a href="#"></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="main_image clearfix">
        <ul>    
        <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): if( count($banner)==0 ) : echo "" ;else: foreach($banner as $key=>$vo): ?>                
            <li>
                <a href="<?php echo $vo['link_url']; ?>">
                    <img src="<?php echo $vo['images']; ?>"></img>
                </a>
            </li>       
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <a href="javascript:;" id="btn_prev"></a>
    <a href="javascript:;" id="btn_next"></a>
</div><!-- main_visual banner部分 End -->
	    <!--内容背景-->
	    <div class="body_minback">
	    	<div class="contain">
	    		<!--内容-->
	    		<div class="contain_com">
	    			<!-- 面包屑导航 -->
			        <div class="breadcrumb">
			            <ul>
			                <li><a name='flagI' href="/" style="color:#666467;">首页</a></li>
			                <li>></li>
			                <li><a href="javascript:void(0);"><?php echo $crumbs; ?></a></li>
			                <li >></li>
			                <li class="jt"><a href="javascript:void(0);"><?php echo $end_crumbs; ?></a></li>
			            </ul>
			        </div><!-- 面包屑导航 end -->
			        <!--内容左-->
			        <div class="matter_left">
			        	<!--侧导航-->
			        	<div class="side_nav">
			        		<div class="side_navtitle"><?php echo $crumbs; ?></div>
			        		<div class="side_navlist side_navlheig" id="cem_detail_title">
			        			<ul>
			        				<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): if( count($category)==0 ) : echo "" ;else: foreach($category as $key=>$vo): ?>
			        					<li tab="<?php echo $vo['id']; ?>" data-url="<?php echo url('home/Article/getList'); ?>" <?php if($vo['id'] == $cate_id): ?> class="thistab"<?php endif; ?>><a href="javascript:void(0)" ><?php echo $vo['name']; ?></a></li>
			        				<?php endforeach; endif; else: echo "" ;endif; ?>
			        			</ul>
			        		</div>
			        	</div><!--侧导航  end-->
			        	<!--联系方式-->
			        	<div class="contact">
	<div class="contact_title">联系方式</div>
	<div class="contact_list">
		<div class="contact_img"><img src="<?php echo $webMessage['web_photo']; ?>" alt="" /></div>
		<p>电话：<span><?php if(!(empty($webMessage['web_tel'][0]) || (($webMessage['web_tel'][0] instanceof \think\Collection || $webMessage['web_tel'][0] instanceof \think\Paginator ) && $webMessage['web_tel'][0]->isEmpty()))): ?><?php echo $webMessage['web_tel']['0']; endif; ?></span><br><span style="margin-left: 35px;"><?php if(!(empty($webMessage['web_tel'][1]) || (($webMessage['web_tel'][1] instanceof \think\Collection || $webMessage['web_tel'][1] instanceof \think\Paginator ) && $webMessage['web_tel'][1]->isEmpty()))): ?><?php echo $webMessage['web_tel']['1']; endif; ?></span></p>
		<p>邮箱：<span><?php echo $webMessage['web_email']; ?></span></p>
		<p>网址：<span><?php echo $webMessage['web_url']; ?></span></p>
	</div>
</div>
			        </div><!--内容左 end-->
			        <!--内容右-->
			        <div class="matter_right">
			        	<div class="news_rightlist">
			        	<ul>
			        		<!--行业动态-->
			        		<li id="tabcem5" class="cem_details_box">
			        			<div class="matter_title"><?php echo $end_crumbs; ?></div>
			        			<!--行业动态列表-->
			        			<div class="lists_list">
			        				<ul id='list_box'>
			        					<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
			        						<li><a href="<?php echo url('home/Article/detail',array('id'=>$v['id'])); ?>#flagD"><?php echo msubstr($v['title'],0,20); ?></a><span><?php echo $v['create_time']; ?></span></li>
			        					<?php endforeach; endif; else: echo "" ;endif; ?>
			        				</ul>
			        			</div><!--行业动态列表 end-->
			        		</li><!--行业动态 end-->
			        		<!--政策法规-->		        		
			        	</ul>
			        </div>
			        <!--分页-->	
						<div class="paging">
							<ul>
								
							</ul>
						</div><!--分页 end-->
			        </div><!--内容右 end-->
	    		</div><!--内容 end-->
	    	</div>
	    	<div class="copyright clear">
    <ul>
        <li><a href="<?php echo url('home/Article/aboutCemetery',array('cid'=>config('about_cemetery'))); ?>">关于陵园</a></li>
        <li><a href="<?php echo url('home/Article/index',array('cid'=>config('cemetery_dynaminc'))); ?>">陵园动态</a></li>
        <li><a href="<?php echo url('home/Scenery/index'); ?>">陵园景观</a></li>
        <li><a href="<?php echo url('home/Tomb/index'); ?>">墓型展示</a></li>
        <li><a href="<?php echo url('home/Product/index'); ?>">产品服务</a></li>
        <li><a href="<?php echo url('home/Article/index',array('cid'=>config('news_center'))); ?>">新闻资讯</a></li>
        <li><a href="<?php echo url('home/Article/aboutCemetery',array('cid'=>config('call_me'))); ?>">联系我们</a></li>
    </ul>
    <p class="copyright_fon">服务热线：<span><?php if(!(empty($webMessage['web_tel'][0]) || (($webMessage['web_tel'][0] instanceof \think\Collection || $webMessage['web_tel'][0] instanceof \think\Paginator ) && $webMessage['web_tel'][0]->isEmpty()))): ?><?php echo $webMessage['web_tel']['0']; endif; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php if(!(empty($webMessage['web_tel'][1]) || (($webMessage['web_tel'][1] instanceof \think\Collection || $webMessage['web_tel'][1] instanceof \think\Paginator ) && $webMessage['web_tel'][1]->isEmpty()))): ?><?php echo $webMessage['web_tel']['1']; endif; ?></span></p>
    <p><?php echo $webMessage['web_site_icp']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $webMessage['web_site_cnzz']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)">91搜墓网版权所有</a></p>
    <p><?php echo $webMessage['web_site_copy']; ?></p>
</div><!-- copyright版权结束 -->
<!-- toolbar返回顶部工具条-->
<div class="toolbar">
	<a id="backTop" href="javascript:;"><img src="__IMG__/index-top.jpg" /></a>
</div>
<!-- toolbar返回顶部工具条end -->
	    </div><!--内容背景 end-->
	    <!-- 轮播jquery.touchSlider.js -->
<script type="text/javascript" src="__JS__/jquery.touchSlider.js"></script>
<script type="text/javascript" src="__JS__/slide.js"></script>
<script src="__JS__/backtop.js"></script>
<script src="__JS__/common.js"></script>
	   <script>
	   		var pageData = <?php echo json_encode($data);?>;
	   </script>
	   <script type="text/javascript" src="__JS__/article.js"></script>
	   <script type="text/javascript" src="__JS__/page.js"></script>
	</body>
</html>
