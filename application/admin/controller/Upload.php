<?php

namespace app\admin\controller;
use think\Controller;
use think\File;
use think\Request;
use think\Db;

class Upload extends Base
{
	//图片上传
    public function upload(){
       $dir = input('dir');
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/images/'.$dir);
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }

    //会员头像上传
    public function uploadface(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/face');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }

}