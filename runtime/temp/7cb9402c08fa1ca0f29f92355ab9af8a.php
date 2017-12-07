<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\wamp\www\project\web\public/../application/admin\view\article\about_cemetery.html";i:1512617817;s:75:"D:\wamp\www\project\web\public/../application/admin\view\public\header.html";i:1511257266;s:75:"D:\wamp\www\project\web\public/../application/admin\view\public\footer.html";i:1511257266;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/style.css">
<script src="/static/admin/ueditor/ueditor.config.js" type="text/javascript"></script>
 <script src="/static/admin/ueditor/ueditor.all.js" type="text/javascript"></script>
<style type="text/css">
/* TAB */
.nav-tabs.nav>li>a {
    padding: 10px 25px;
    margin-right: 0;
}
.nav-tabs.nav>li>a:hover,
.nav-tabs.nav>li.active>a {
    border-top: 3px solid #1ab394;
    padding-top: 8px;
    border-bottom: 1px solid #FFFFFF;
}
.nav-tabs>li>a {
    color: #A7B1C2;
    font-weight: 500;  
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 0;
}
</style>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>关于陵园</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">       
                    <div class="panel blank-panel">
                        <div class="panel-heading">                     
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$vo): ?>
                                        <li <?php if($key == 0): ?> class="active" <?php endif; ?>><a data-toggle="tab" href="#<?php echo $vo['id']; ?>" aria-expanded="true"><?php echo $vo['name']; ?></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $k=>$v): ?>
                                <div id="<?php echo $v['id']; ?>" class="tab-pane <?php if($k == 0): ?> active<?php endif; ?>">
                                    <form action="<?php echo url('save'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">  
                                        <div class="hr-line-dashed"></div>                                
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">标题：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" class="form-control" name="data[title]" <?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?> value="<?php echo $artData[$v['id']]['title']; ?>" <?php endif; ?> >
                                            </div>
                                        </div>                                 
                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">描述：</label>
                                            <div class="input-group col-sm-4">
                                                <textarea type="text" rows="5" name="data[remark]" id="remark" placeholder="输入文章描述" class="form-control"><?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?><?php echo $artData[$v['id']]['remark']; endif; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label " for="myEditor<?php echo $v['id']; ?>">内容：</label>
                                            <div class="input-group col-sm-9">
                                                
                                                <textarea name="data[content]" style="width:90%" id="myEditor<?php echo $v['id']; ?>"><?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?> <?php echo $artData[$v['id']]['content']; endif; ?></textarea>
                                                <script type="text/javascript">
                                                    var editor = new UE.ui.Editor();
                                                    editor.render("myEditor<?php echo $v['id']; ?>");
                                                </script>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">封面</label>
                                            <div class="input-group col-sm-4 upload-box">
                                                <div style="float:left" class="webuploader-container">
                                                    <div class="webuploader-pick">选择图片</div>
                                                    <div style="top: 0px; left: 0px; width: 30px; height: 20px; overflow: hidden; bottom: auto; right: auto;">
                                                        <input type="file" name="photo" class="webuploader-element-invisible" multiple="multiple" accept="image/jpg,image/jpeg,image/png">
                                                        <label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label>
                                                    </div>
                                                </div>
                                                <img height="100px"  style="float:left;margin-left: 50px;margin-top: -10px;"  <?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?> src="<?php echo $artData[$v['id']]['photo']; ?>" <?php else: ?> src="/static/admin/images/no_img.jpg"<?php endif; ?>/>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                       
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">状&nbsp;态：</label>
                                            <div class="col-sm-6">
                                                <div class="radio i-checks">
                                                    <?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?>
                                                        <input type="radio" name='data[status]' value="1" <?php if($artData[$v['id']]['status'] == 1): ?> checked="checked" <?php endif; ?>/>开启&nbsp;&nbsp;
                                                        <input type="radio" name='data[status]' value="2" <?php if($artData[$v['id']]['status'] == 2): ?> checked="checked" <?php endif; ?>/>关闭
                                                    <?php else: ?>
                                                        <input type="radio" name='data[status]' value="1" checked="checked" />开启&nbsp;&nbsp;
                                                        <input type="radio" name='data[status]' value="2" />关闭
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">访问量：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" name="data[views]" id="views" <?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?> value="<?php echo $artData[$v['id']]['views']; ?>" <?php else: ?> value="1" <?php endif; ?>  class="form-control">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">排序：</label>
                                            <div class="input-group col-sm-4">
                                                <input type="text" name="data[sort]" id="sort" <?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?> value="<?php echo $artData[$v['id']]['sort']; ?>" <?php else: ?> value="0" <?php endif; ?>  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <input type="hidden" name='data[id]' <?php if(!(empty($artData[$v['id']]) || (($artData[$v['id']] instanceof \think\Collection || $artData[$v['id']] instanceof \think\Paginator ) && $artData[$v['id']]->isEmpty()))): ?> value="<?php echo $artData[$v['id']]['id']; ?>" <?php endif; ?>>
                                        <input type="hidden" name='data[cate_id]' <?php if(!(empty($v['id']) || (($v['id'] instanceof \think\Collection || $v['id'] instanceof \think\Paginator ) && $v['id']->isEmpty()))): ?> value="<?php echo $v['id']; ?>" <?php endif; ?>>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-3">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存信息</button>&nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i> 返回</a>
                                            </div>
                                        </div>                               
                                    </form>
                                </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
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
<script type="text/javascript" src="/static/admin/webupload/webuploader.min.js"></script>

<script type="text/javascript">
    
    //点击出发input file
    $('.webuploader-pick').on('click',function(){
        $(this).parent('div').find('input').click();
    });
    
    //选择图片
    $('.webuploader-element-invisible').on('change',function(){
        var windowURL = window.URL || window.webkitURL,
            filesName = '',
            srcUrl = '';
        if (this.files.length > 0) {
            filesName = this.files[0].name;
            srcUrl = windowURL.createObjectURL(this.files[0]);
        }
        $(this).parents('.upload-box').find('img').attr('src', srcUrl);
    })

    var config = {
        '.chosen-select': {},                    
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>
</body>
</html>
