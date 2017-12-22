<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\wamp\www\project\web\public/../application/admin\view\index\index.html";i:1512639519;s:75:"D:\wamp\www\project\web\public/../application/admin\view\public\header.html";i:1511257266;s:75:"D:\wamp\www\project\web\public/../application/admin\view\public\footer.html";i:1511257266;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo config('WEB_SITE_TITLE'); ?></title>
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <style type="text/css">
    .long-tr th{
        text-align: center
    }
    .long-td td{
        text-align: center
    }
    </style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <div><span id="weather"></span></div>
    </div>

    <!-- 上方tab -->
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right"><?php echo date('d',$info['time']); ?></span>
                    <span class="label pull-right"><?php echo date('m',$info['time']); ?></span>
                    <span class="label label-success pull-right"><?php echo date('Y',$info['time']); ?></span>
                    <h5>文章</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $info['article']; ?></h1>
                    <small>文章总数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right"><?php echo date('d',$info['time']); ?></span>
                    <span class="label pull-right"><?php echo date('m',$info['time']); ?></span>
                    <span class="label label-success pull-right"><?php echo date('Y',$info['time']); ?></span>
                    <h5>陵园风景</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $info['scenery']; ?></h1>
                    <small>风景总数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right"><?php echo date('d',$info['time']); ?></span>
                    <span class="label pull-right"><?php echo date('m',$info['time']); ?></span>
                    <span class="label label-success pull-right"><?php echo date('Y',$info['time']); ?></span>
                    <h5>墓型</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $info['tomb']; ?></h1>
                    <small>墓型总数量</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label pull-right"><?php echo date('d',$info['time']); ?></span>
                    <span class="label pull-right"><?php echo date('m',$info['time']); ?></span>
                    <span class="label label-success pull-right"><?php echo date('Y',$info['time']); ?></span>
                    <h5>产品及服务</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $info['product']; ?></h1>
                    <small>产品服务总数量</small>
                </div>
            </div>
        </div>
    </div>

    <!-- 中间折线 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 系统信息
                    </div>
                    <div class="panel-body">
                        <p><i class="fa fa-sitemap"></i> 框架版本：ThinkPHP<?php echo $info['think_v']; ?>
                        </p>
                        <p><i class="fa fa-windows"></i> 服务环境：<?php echo $info['web_server']; ?>
                        </p>
                        <p><i class="fa fa-warning"></i> 上传附件限制：<?php echo $info['onload']; ?>
                        </p>
                        <p><i class="fa fa-credit-card"></i> PHP 版本：<?php echo $info['phpversion']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 系统信息
                    </div>
                    <div class="panel-body">
                        <p><i class="fa fa-send-o"></i> 域名：<?php echo $info['serverName']; ?></p>
                        <p><i class="fa fa-share-alt"></i> 端口：<?php echo $info['serverPort']; ?></p>
                        <p><i class="fa fa-cubes"></i> IP地址:<?php echo $info['remoteAddr']; ?></p>
                        <p><i class="fa fa-credit-card"></i> 协议版本：<?php echo $info['serverProt']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/chosen/chosen.jquery.js"></script>
<script src="__JS__/plugins/iCheck/icheck.min.js"></script>
<script src="__JS__/plugins/layer/laydate/laydate.js"></script>
<script src="__JS__/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="__JS__/jquery.form.js"></script>
<script src="__JS__/layer/layer.js"></script>
<script src="__JS__/laypage/laypage.js"></script>
<script src="__JS__/laytpl/laytpl.js"></script>
<script src="__JS__/lunhui.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script src="/static/admin/js/jquery.leoweather.min.js"></script>

<script type="text/javascript">
    $('#weather').leoweather({format:'{时段}好！<span id="colock">现在时间是：<strong>{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}</strong>'});
</script>

</body>
</html>