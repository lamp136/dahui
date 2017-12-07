<?php
use think\Db;

/**
 * 将字符解析成数组
 * @param $str
 */
function parseParams($str)
{
    $arrParams = [];
    parse_str(html_entity_decode(urldecode($str)), $arrParams);
    return $arrParams;
}


/**
 * 子孙树 用于菜单整理
 * @param $param
 * @param int $pid
 */
function subTree($param, $pid = 0)
{
    static $res = [];
    foreach($param as $key=>$vo){

        if( $pid == $vo['pid'] ){
            $res[] = $vo;
            subTree($param, $vo['id']);
        }
    }

    return $res;
}


/**
 * 记录日志
 * @param  [type] $uid         [用户id]
 * @param  [type] $username    [用户名]
 * @param  [type] $description [描述]
 * @param  [type] $status      [状态]
 * @return [type]              [description]
 */
function writelog($uid,$username,$description,$status)
{

    $data['admin_id'] = $uid;
    $data['admin_name'] = $username;
    $data['description'] = $description;
    $data['status'] = $status;
    $data['ip'] = request()->ip();
    $data['add_time'] = time();
    $log = Db::name('Log')->insert($data);

}


/**
 * 整理菜单树方法
 * @param $param
 * @return array
 */
function prepareMenu($param)
{
    $parent = []; //父类
    $child = [];  //子类

    foreach($param as $key=>$vo){

        if($vo['pid'] == 0){
            $vo['href'] = '#';
            $parent[] = $vo;
        }else{
            $vo['href'] = url($vo['name']); //跳转地址
            $child[] = $vo;
        }
    }

    foreach($parent as $key=>$vo){
        foreach($child as $k=>$v){

            if($v['pid'] == $vo['id']){
                $parent[$key]['child'][] = $v;
            }
        }
    }
    unset($child);
    return $parent;
}


/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    for ($i = 0; $size >= 1024 && $i < 5; $i++) {
        $size /= 1024;
    }
    return $size . $delimiter . $units[$i];
}

/**
 * 上传单个文件
 * @param string    $imgName    form表单中文件域的name值
 * @param string    $dirName    图片保存的文件夹
 * @param array     $thumb       array(
  array('600', '600', 1),
  array('350', '350', 1),
  array('130', '130', 1),
  ))  宽、高、缩略图的处理方式
 * @return array
 */
function uploadOne($imgName,$dirName,$thumb = [],$water = true) {
    $img = request()->file($imgName);
    $maxSize = (int)config('max_size');
    $ext = config('ext');
    $umf = (int)ini_get('upload_max_filesize');
    $readSize = min($umf, $maxSize)* 1024 * 1024;
    $path = ROOT_PATH . config('root_path') . $dirName;
  
    //上传文件
    $info = $img->validate(['size' => $readSize,'ext' => $ext])->move($path);
    $file_name = str_replace("\\", "/", $info->getSaveName());
    $save_path = substr($file_name,0,strpos($file_name,'/'));

    $fileError = $info->getError();
    $saveFile = config('img_host').'/'.$dirName .'/'. $file_name;
    $factFilename = config('root_path') .$dirName .'/'. $file_name;
    if(!empty($fileError)){
        $ret = [
            'ok' => 0,
            'error' => $img->getError()
        ];
        return $ret;
    }else{
        $ret = [
            'ok' => 1,
            'images' => [$saveFile],
        ];
    }

    //添加水印
    if($water){
        $imgobj = new \think\File('.'.$factFilename);
        $image = \think\Image::open($imgobj);
        $image->water(config('water_pic_path'),config('water_southeast'),40)->save($path.'/'.$file_name);
    }
    //是否生成缩略图
    if($thumb){
        $image = \think\Image::open($imgobj);
        foreach ($thumb as $k => $v) {
            $_imgName = config('root_path') .$dirName .'/'.$save_path.'/'. 'thumb_' . $v[0] . 'X' . $v[1] . '_' . $info->getFilename(); 

            // 把这个缩略图的名字放到要返回的图片中
            $ret['images'][] = config('img_host').'/'.$dirName .'/'.$save_path.'/'. 'thumb_' . $v[0] . 'X' . $v[1] . '_' . $info->getFilename();
            $image->thumb($v[0], $v[1], $v[2])->save(ROOT_PATH .$_imgName);

            // $water = \think\Image::open(ROOT_PATH .$_imgName);
            // $water->water(Config('water_pic_path'),Config('water_southeast'))->save(ROOT_PATH .$_imgName);
        }
    }
    return  $ret;
}
