<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:72:"D:\wamp\www\project\web\public/../application/home\view\index\index.html";i:1512632985;s:73:"D:\wamp\www\project\web\public/../application/home\view\public\title.html";i:1512460328;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\header.html";i:1512633002;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\footer.html";i:1512697646;s:74:"D:\wamp\www\project\web\public/../application/home\view\public\linkjs.html";i:1512110520;}*/ ?>
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
	    <div class="body_img">
	    	<div class="contain">
	    		<!--内容-->
	    		<div class="contain_con">
	    			<!--内容左-->
	    			<div class="main_left">
	    				<!--左内容第一部分   -->
	    				<div class="main_first">
	    					<!--左内容第一部分左   -->
	    					<div class="main_first_left">
	    						<!--小轮播-->
	    						<div class="swiper-container" >
									<div class="swiper-wrapper">
										<div class="swiper-slide"><img src="<?php echo $scenery['photo']; ?>" alt="" /></div>
									</div>
									<!-- 如果需要分页器 -->
									<div class="swiper-pagination"></div>
								</div><!--小轮播 end-->
								<div class="main_left_bottom">
	    							<h6><?php echo $scenery['sname']; ?></h6>
	    							<p><?php echo msubstr($scenery['remark'],0,50); ?><a href="<?php echo url('home/Scenery/detail',array('id'=>$scenery['id'])); ?>">【详细】</a></p>
									
	    						</div>
	    					</div><!--左内容第一部分左  end -->
	    					<!--左内容第一部分右   -->
	    					<div class="main-first_right">
	    						<div class="main-firsttit"><span>新闻资讯</span><a href="<?php echo url('home/Article/index',['cid'=>config('news')]); ?>">更多</a></div>
	    						<div class="main_right_bottom">
	    							<ul>
                                        <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): if( count($news)==0 ) : echo "" ;else: foreach($news as $key=>$vo): ?>
	    								<li><a href="<?php echo url('home/Article/detail',['id'=>$vo['id']]); ?>"><?php echo msubstr($vo['title'],0,18); ?></a><span><?php echo date('Y-m-d',$vo['create_time']); ?></span></li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
	    							</ul>
	    						</div>
	    					</div><!--左内容第一部分右  end -->
	    				</div><!--左内容第一部分 end  -->
	    				<div style="height: 15px; clear: both;"></div>
	    				<!--左内容第二部分-->
	    				<div class="main_second clear">
	    					<div class="main_second_left">
	    						<ul>
	    							<li><a href="<?php echo url('home/Scenery/index'); ?>">陵园景观</a></li>
	    							<li><a href="<?php echo url('home/Tomb/index'); ?>">墓型展示</a></li>
	    							<li><a href="<?php echo url('home/Product/index'); ?>">产品服务</a></li>
	    							<li><a href="<?php echo url('home/Article/index',['cid'=>config('cemetery_dynaminc')]); ?>">陵园动态</a></li>
	    							<li><a href="<?php echo url('home/Article/aboutCemetery',['cid'=>config('buying_tombs')]); ?>">购墓流程</a></li>
								</ul>
	    					</div>
	    					<div class="main_second_cen">
	    						<div class="main_center_ceme"><img src="__IMG__/index-start.png" alt="" />陵园简介<a href="<?php echo url('home/Article/aboutCemetery',['cid'=>config('cemetery_synopsis')]); ?>">更多</a></div>
	    						<?php if(!(empty($lyjj[0]) || (($lyjj[0] instanceof \think\Collection || $lyjj[0] instanceof \think\Paginator ) && $lyjj[0]->isEmpty()))): ?>
	    							<div class="main_center_img"><img src="<?php echo $lyjj['0']['photo']; ?>" alt="" /></div>
	    							<p><?php echo msubstr($lyjj['0']['remark'],0,70); ?><a href="<?php echo url('home/Article/aboutCemetery',['cid'=>$lyjj[0]['cate_id']]); ?>">【详细】</a></p>
	    						<?php endif; ?>
	    					</div>
	    					<div class="main_second_right">
	    						<div class="main_right_ceme"><img src="__IMG__/index-shu.png" alt="" />企业文化<a href="<?php echo url('home/Article/aboutCemetery',['cid'=>config('corporate_culture')]); ?>">更多</a></div>
	    						<?php if(!(empty($qywh) || (($qywh instanceof \think\Collection || $qywh instanceof \think\Paginator ) && $qywh->isEmpty()))): ?>
	    							<a href="<?php echo url('home/Article/aboutCemetery',['cid'=>$qywh[0]['cate_id']]); ?>"><div class="main_right_fontone"><?php echo msubstr($qywh['0']['remark'],0,70); ?></div></a>
								<?php endif; ?>
	    					</div>
	    				</div><!--左内容第二部分 end-->
	    				<!--左内容第三部分-->
	    				<div class="main_three">
	    					<div class="main_three_title">墓型展示<a href="<?php echo url('home/Tomb/index'); ?>">更多</a></div>
	    					<!--墓型展示列表-->
	    					<div class="tomb_list">
	    						<ul>
                                    <?php if(is_array($tomb) || $tomb instanceof \think\Collection || $tomb instanceof \think\Paginator): if( count($tomb)==0 ) : echo "" ;else: foreach($tomb as $key=>$t): ?>
    	    							<li>
    	    								<div class="tomb_img"><a href="<?php echo url('home/Tomb/detail',array('id'=>$t['id'])); ?>"><img src="<?php echo $t['photo']; ?>" alt="<?php echo $t['tomb_name']; ?>" /></a></div>
    	    								<p><?php echo $t['tomb_name']; ?></p>
    	    							</li>
	    							<?php endforeach; endif; else: echo "" ;endif; ?>
	    						</ul>
	    					</div><!--墓型展示列表  end-->
	    				</div><!--左内容第三部分 end-->
	    				<!--左内容第四部分-->
	    				<div class="main_three main_fourth">
	    					<div class="main_three_title">产品服务<a href="<?php echo url('home/Product/index'); ?>">更多</a></div>
	    					<!--产品服务列表-->
	    					<div class="product_list" id="demo" style="overflow: hidden;">
								<table border="0" align="center" cellpadding="1" cellspacing="1" cellspace="0">
									<tr>
										<td id="demo1" valign="top" >
											<table border="0" cellspacing="0" cellpadding="0">
												<tr align="center" >
                                                    <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): if( count($product)==0 ) : echo "" ;else: foreach($product as $key=>$p): ?>
													<td calss="product_tdd">
														<a href="<?php echo url('home/Product/detail',array('id'=>$p['id'])); ?>" target="_blank">
															<img class="product_img" src="<?php echo $p['photo']; ?>"  alt="<?php echo $p['product_name']; ?>" >
														</a>
														<span><?php echo $p['product_name']; ?></span>
													</td>	
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>			
												</tr>
											</table>
										</td>
										<td id="demo2" valign="top">
										</td>
									</tr>
								</table>
							</div> <!--产品服务列表  end-->
	    				</div><!--左内容第四部分  end-->
	    				<!--左内容第五部分-->
	    				<div class="main_three main_fifth">
	    					<div class="main_three_title">友情链接</div>
	    					<!--友情链接列表-->
	    					<div class="blogroll_list">
	    						<ul>
                                    <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): if( count($link)==0 ) : echo "" ;else: foreach($link as $key=>$l): ?>
	    							    <li><a href="<?php echo $l['url']; ?>" target="_blank"><?php echo $l['name']; ?></a></li>	
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
	    						</ul>
	    					</div><!--友情链接列表 end-->
	    				</div><!--左内容第五部分 end-->
	    			</div><!--内容左 end-->
	    			<!--内容右-->
	    			<div class="main_right">
	    				<!--内容右第一部分-->
	    				<div class="main_right_first">
	    					<div class="main-right_tit">通知公告<a href="<?php echo url('home/Article/aboutCemetery',['cid'=>config('notice')]); ?>">更多</a></div>
	    					<?php if(!(empty($notice) || (($notice instanceof \think\Collection || $notice instanceof \think\Paginator ) && $notice->isEmpty()))): ?>
		    					<div class="main_right_conte">
		    						<p><?php echo msubstr($notice['0']['remark'],0,100); ?></p>
		    					</div>
	    					<?php endif; ?>
	    				</div>
	    				<!--内容右第一部分 end-->
	    				<!--内容右第二部分-->
	    				<div class="main_right_second">
	    					<a href="<?php echo $ad['link_url']; ?>"><img src="<?php echo $ad['images']; ?>" alt="<?php echo $ad['title']; ?>" /></a>
	    				</div>
	    				<!--内容右第二部分 end-->
	    				<!--内容右第三部分-->
	    				<div class="main_right_first main_right_three ">
	    					<div class="main-right_tit">殡葬知识<a href="<?php echo url('home/Article/index',['cid'=>config('funeral_knowledge')]); ?>">更多</a></div>
	    					<!--殡葬知识列表-->
	    					<div class="funeral_list">
	    						<ul>
                                    <?php if(is_array($funeral) || $funeral instanceof \think\Collection || $funeral instanceof \think\Paginator): if( count($funeral)==0 ) : echo "" ;else: foreach($funeral as $key=>$v): ?>
	    							    <li><a href="<?php echo url('home/Article/detail',['id'=>$v['id']]); ?>"><?php echo msubstr($v['title'],0,20); ?></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
	    						</ul>
	    					</div><!--殡葬知识列表  end-->
	    				</div><!--内容右第三部分  end-->
	    				<!--内容右第四部分-->
	    				<div class="main_right_first main_right_three ">
	    					<div class="main-right_tit">风水文化<a href="<?php echo url('home/Article/index',['cid'=>config('fengshui')]); ?>">更多</a></div>
	    					<!--风水文化列表-->
	    					<div class="funeral_list">
	    						<ul>
                                    <?php if(is_array($fengshui) || $fengshui instanceof \think\Collection || $fengshui instanceof \think\Paginator): if( count($fengshui)==0 ) : echo "" ;else: foreach($fengshui as $key=>$f): ?>
	    								<li><a href="<?php echo url('home/Article/detail',['id'=>$f['id']]); ?>"><?php echo msubstr($f['title'],0,20); ?></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
	    						</ul>
	    					</div><!--风水文化列表  end-->
	    				</div><!--内容右第四部分  end-->
	    				<!--内容右第五部分-->
	    				<div class="main_right_first main_right_fifth">
	    					<div class="main-right_tit">服务优势</div>
	    					<!--服务优势内容-->
	    					<div class="adva">
	    						<?php if(!(empty($service) || (($service instanceof \think\Collection || $service instanceof \think\Paginator ) && $service->isEmpty()))): ?>
		    						<div class="adva_img"><img src="<?php echo $service['0']['photo']; ?>" alt="" /></div>
		    						<p><?php echo msubstr($service['0']['remark'],0,100); ?><a href="<?php echo url('home/Article/aboutCemetery',array('cid'=>$service[0]['cate_id'])); ?>">【详细】</a></p>
	    						<?php endif; ?>
	    					</div>
	    					<!--服务优势内容 end-->
	    				</div><!--内容右第五部分 end-->
	    			</div><!--内容右end--> 
	    		</div>
	    		<!--内容 end-->
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
    <p><?php echo $webMessage['web_site_icp']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $webMessage['web_site_cnzz']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)">91搜墓网版权所有</a></p>
    <p><?php echo $webMessage['web_site_copy']; ?></p>
</div><!-- copyright版权结束 -->
<!-- toolbar返回顶部工具条-->
<div class="toolbar">
	<a id="backTop" href="javascript:;"><img src="__IMG__/index-top.jpg" /></a>
</div>
<!-- toolbar返回顶部工具条end -->  
	</div>
	  	 <!-- 轮播jquery.touchSlider.js -->
<script type="text/javascript" src="__JS__/jquery.touchSlider.js"></script>
<script type="text/javascript" src="__JS__/slide.js"></script>
<script src="__JS__/backtop.js"></script>
<script src="__JS__/common.js"></script>  	
		<script type="text/javascript"> 
			var speed=30;
			var demo = $("#demo");
			var demo1 = $("#demo1");
			var demo2 = $("#demo2");
			demo2.html(demo1.html());
			function Marquee(){ 				
				if(demo.scrollLeft()>=demo1.width())
					demo.scrollLeft(0); 
				else{
					demo.scrollLeft(demo.scrollLeft()+1);
				}
			} 
			var MyMar=setInterval(Marquee,speed) 
			demo.mouseover(function() {
				clearInterval(MyMar);
			} )
			demo.mouseout(function() {
				MyMar=setInterval(Marquee,speed);
			} )

			//小轮播
			// var mySwiper = new Swiper('.swiper-container', {
			// 	autoplay: 500, //可选选项，自动滑动
			// 	loop:  true,
			// 	autoplay:  2000,
			// 	speed:  1000,
			// 	autoplayDisableOnInteraction:  false,
			// 	pagination: '.swiper-pagination',
			// 	// 如果需要分页器
			// 	pagination: '.swiper-pagination',

			// 	//点击圆点轮播
			// 	paginationClickable :true,
				
			// })
			// $(".swiper-container").mouseover(function () ).mouseout(function());
		</script>
	</body>
</html>
