<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:72:"D:\wamp\www\project\web\public/../application/home\view\tomb\detail.html";i:1512015073;s:73:"D:\wamp\www\project\web\public/../application/home\view\public\title.html";i:1512460328;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\header.html";i:1512461103;s:78:"D:\wamp\www\project\web\public/../application/home\view\public\contactWay.html";i:1512456346;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\footer.html";i:1512468369;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\linkjs.html";i:1512110520;}*/ ?>
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
                    <span style="background: url('<?php echo $vo['images']; ?>') center top no-repeat;"></span>
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
			                <li><a name='flagD' href="/" style="color:#666467;">首页</a></li>
			                <li>></li>
			                <li><a href="<?php echo url('home/Tomb/index'); ?>">墓型展示</a></li>
			                <li >></li>
			                <li><a href="<?php echo url('home/Tomb/index',array('cid'=>$cate['id'])); ?>"><?php echo $cate['name']; ?></a></li>
			                <li >></li>
			                <li class="jt"><a href="javascript:void(0)"><?php echo $data['tomb_name']; ?></a></li>
			            </ul>
			        </div><!-- 面包屑导航 end -->
			        <!--内容左-->
			        <div class="matter_left">
			        	<!--侧导航-->
			        	<div class="side_nav">
			        		<div class="side_navtitle">墓型展示</div>
			        		<div class="side_navlist" id="cem_detail_title">
			        			<ul>
			        				<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): if( count($category)==0 ) : echo "" ;else: foreach($category as $key=>$vo): ?>
			        					<li <?php if($vo['id'] == $cate['id']): ?> class="thistab"<?php endif; ?>><a href="<?php echo url('home/Tomb/index',array('cid'=>$vo['id'])); ?>#flagI" ><?php echo $vo['name']; ?></a></li>
			        				<?php endforeach; endif; else: echo "" ;endif; ?>
			        			</ul>
			        		</div>
			        	</div><!--侧导航  end-->
			        	<!--联系方式-->
			        	<div class="contact">
	<div class="contact_title">联系方式</div>
	<div class="contact_list">
		<div class="contact_img"><img src="__IMG__/jing-img0.jpg" alt="" /></div>
		<p>电话：<span><?php if(!(empty($webMessage['web_tel'][0]) || (($webMessage['web_tel'][0] instanceof \think\Collection || $webMessage['web_tel'][0] instanceof \think\Paginator ) && $webMessage['web_tel'][0]->isEmpty()))): ?><?php echo $webMessage['web_tel']['0']; endif; ?></span><br><span style="margin-left: 35px;"><?php if(!(empty($webMessage['web_tel'][1]) || (($webMessage['web_tel'][1] instanceof \think\Collection || $webMessage['web_tel'][1] instanceof \think\Paginator ) && $webMessage['web_tel'][1]->isEmpty()))): ?><?php echo $webMessage['web_tel']['1']; endif; ?></span></p>
		<p>邮箱：<span><?php echo $webMessage['web_email']; ?></span></p>
		<p>网址：<span><?php echo $webMessage['web_url']; ?></span></p>
	</div>
</div>  
			        	<!--联系方式 end-->
			        </div><!--内容左 end-->
			        <!--内容右-->
			        <div class="matter_right">
			        	<div class="landscape_title">详情介绍</div>
			        	<ul>
			        		<!--福寿园详情内容-->
			        		<li id="tabcem1" class="cem_details_box">
			        			
					        	<div class="landscape_main">
					        		<h3><?php echo $data['tomb_name']; ?></h3>
					        		
					        		<div class="landscape_font"><a>简介：</a><span><?php echo $data['content']; ?></span></div>
					        		<div class="landscape_fonttw clear">
					        			<span class="landscape_span">价格：<a><?php if(!(empty($data['price']) || (($data['price'] instanceof \think\Collection || $data['price'] instanceof \think\Paginator ) && $data['price']->isEmpty()))): ?><?php echo $data['price']; ?>万<?php endif; ?></a></span>
					        			<span>材质：<a><?php echo $data['material']; ?></a></span>
					        			<span>朝向<a><?php echo $data['orientation']; ?></a></span>
					        			<span>大小：<a><?php echo $data['size']; ?></a></span>
					        			<span>穴位：<a><?php echo $data['acupoint']; ?></a></span></div>
					        	</div>
			        		</li><!--福寿园详情内容 end-->			        		
			        	</ul>
			       	</div><!--内容右 end-->
	    		</div><!--内容 end-->
	    	</div>
	    	<!-- 版权 -->
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
    <p><?php echo $webMessage['web_site_icp']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $webMessage['web_site_cnzz']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">91搜墓网版权所有</a></p>
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
	</body>
</html>
