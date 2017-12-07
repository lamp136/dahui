<?php

namespace app\admin\controller;
use app\admin\model\ArticleModel;
use app\admin\model\ArticleCateModel;
use think\Db;

class Article extends Base
{

    /**
     * [index 文章列表]
     * @author [田建龙] [864491238@qq.com]
     */
    public function index(){

        $key = input('key');
        $map = [];
        $cate = Db::name('article_cate')->where('pid',config('news_center'))->column('id','name');
               
        $map['think_article.status'] = array('neq',config('delete_status'));
        $map['cate_id'] = array('in',$cate);
        if($key&&$key!==""){
            $map['title'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('article')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $article = new ArticleModel();
        $lists = $article->getArticleByWhere($map, $Nowpage, $limits);
        foreach ($lists as $k => $v) {
            $lists[$k]['title'] = msubstr($v['title'],0,15);
            $lists[$k]['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
            $lists[$k]['update_time'] = date('Y-m-d H:i:s',$v['update_time']);
        }
        $pidname = Db::name('article_cate')->field('pid,name')->select();

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count', $count); 
        $this->assign('val', $key);
        if(input('get.page')){
            return json($lists);
        }
        return $this->fetch();
    }


    /**
     * [add_article 添加文章]
     * @return [type] [description]
     */
    public function add_article()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $article = new ArticleModel();
            $flag = $article->insertArticle($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $nav = new \org\Leftnav;
        $menu = new ArticleCateModel();
        $where['status'] = array('eq',config('normal_status'));
        $where['pid'] = array('neq',config('about_cemetery'));
        $cate = $menu->getAllCate($where);
        $pidArr = Db::name('article_cate')->where($where)->group('pid')->column('id,pid');
        foreach ($cate as $key => $value) {
            if(in_array($value['id'], $pidArr)){
                $cate[$key]['father'] = 'true';
            }
            if($value['id'] == config('about_cemetery')){
                unset($cate[$key]);
            }
        }

        $arr = $nav::rule($cate);
        $this->assign('cate',$arr);
        return $this->fetch();
    }


    /**
     * [edit_article 编辑文章]
     * @return [type] [description]
     */
    public function edit_article()
    {
        $article = new ArticleModel();     
        if(request()->isAjax()){

            $param = input('post.');         
            $flag = $article->updateArticle($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $nav = new \org\Leftnav;
        $menu = new ArticleCateModel();
        $where['status'] = array('eq',config('normal_status'));
        $where['pid'] = array('neq',config('about_cemetery'));
        $cate = $menu->getAllCate($where);
        $pidArr = Db::name('article_cate')->where($where)->group('pid')->column('id,pid');
        foreach ($cate as $key => $value) {
            if(in_array($value['id'], $pidArr)){
                $cate[$key]['father'] = 'true';
            }
            if($value['id'] == config('about_cemetery')){
                unset($cate[$key]);
            }
        }
        $arr = $nav::rule($cate);
        $this->assign('cate',$arr);
        $this->assign('article',$article->getOneArticle($id));
        return $this->fetch();
    }



    /**
     * [del_article 删除文章]
     * @return [type] [description]
     * @author [田建龙] [864491238@qq.com]
     */
    public function del_article()
    {
       $id = input('param.id');
        $flag = Db::name('article')->where('id',$id)->setField(['status'=>config('delete_status')]);
        if($flag){
            return json(['code' =>1, 'data' =>'', 'msg' => '删除成功']);
        }else{
            return json(['code' =>0, 'data' =>'', 'msg' => '删除失败']);
        }
    }



    /**
     * [article_state 文章状态]
     * @return [type] [description]
     * @author [田建龙] [864491238@qq.com]
     */
    public function article_state()
    {
        $id=input('param.id');
        $status = Db::name('article')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('article')->where(array('id'=>$id))->setField(['status'=>2]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('article')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }



    //*********************************************分类管理*********************************************//

    /**
     * [index_cate 分类列表]
     * @return [type] [description]
     */
    public function index_cate(){

        $nav = new \org\Leftnav;
        $menu = new ArticleCateModel();
        $where['status'] = array('neq',config('delete_status'));
        $article = $menu->getAllCate($where);
        $arr = $nav::rule($article);
        $this->assign('article',$arr);
        return $this->fetch();
    }


    /**
     * [add_cate 添加分类]
     * @return [type] [description]
     */
    public function add_cate()
    {
        $param = input('post.');
        $param['create_time'] = time();
        $param['update_time'] = time();
        try{
            $result = Db::name('article_cate')->insert($param);
            if(false === $result){            
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加菜单成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
            
    }


    /**
     * [edit_cate 编辑分类]
     * @return [type] [description]
     */
    public function edit_cate()
    {
       $cate = new ArticleCateModel();
        if(request()->isPost()){
            $param = input('post.');
            $flag = $cate->editCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $this->assign('cate',$cate->getOneCate($id));
        return $this->fetch();
    }


    /**
     * [del_cate 删除分类]
     * @return [type] [description]
     */
    public function del_cate()
    {
        $id = input('param.id');
        $res = Db::name('article_cate')->where('pid',$id)->select();
        if($res){
            return json(['code' =>0, 'data' =>'', 'msg' => '该类下有子类不能删除']);
        }
        $flag = Db::name('article_cate')->where('id',$id)->setField(['status'=>config('delete_status')]);
        if($flag){
            return json(['code' =>1, 'data' =>'', 'msg' => '删除成功']);
        }else{
            return json(['code' =>0, 'data' =>'', 'msg' => '删除失败']);
        }
    }



    /**
     * [cate_state 分类状态]
     * @return [type] [description]
     */
    public function cate_state()
    {
        $id=input('param.id');
        $status = Db::name('article_cate')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('article_cate')->where(array('id'=>$id))->setField(['status'=>2]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('article_cate')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }  

    /************************************关于陵园*****************************/
    public function about_cemetery(){
        $cateWhere['status'] = array('neq',config('delete_status'));
        $cateWhere['pid'] = config('about_cemetery');
        $cate = Db::name('article_cate')->where($cateWhere)->order('orderby desc,id desc')->field('id,pid,name')->select();
        foreach ($cate as $key => $value) {
            $cateArr[] = $value['id'];
        }

        $artWhere['cate_id'] = array('in',$cateArr);
        $artWhere['status'] = array('neq',config('delete_status'));      
        $article = Db::name('article')->where($artWhere)->select();
        foreach ($article as $k => $v) {
            $artData[$v['cate_id']] = $v;
        }
        $this->assign('artData',$artData);
        $this->assign('cate',$cate);
        return $this->fetch();
    }


    /**
     * 保存信息
     * @return [type] [description]
     */
    public function save(){
        $input = input('post.');
        $data = $input['data'];

        if($_FILES['photo']['error'] == 0 && !empty($_FILES['photo']['tmp_name'])){
            $imagesRet = uploadOne('photo','article',false,false);
            if($imagesRet['ok'] == 0){
                $this->error($imagesRet['error']);
            }else{
                $data['photo'] = $imagesRet['images'][0];   
            }
        }

        $data['update_time'] = time();
        if(empty($data['id'])){
            $data['create_time'] = time();
            $res = Db::name('article')->insert($data);
        }else{
            $res = Db::name('article')->update($data);
        }
        $this->success('修改成功');
    }

}