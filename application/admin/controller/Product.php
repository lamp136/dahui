<?php
namespace app\admin\controller;
use app\admin\model\ProductModel;
use app\admin\model\ProductCateModel;
use think\Db;

/*************************产品服务类******************/
class Product extends Base
{
	
	 /**
     * [index_cate 分类列表]
     * @return [type] [description]
     */
    public function index_cate(){

        $cate = new ProductCateModel();
        $list = $cate->getAllCate();
        $this->assign('list',$list);
        return $this->fetch();
    }


    /**
     * [add_cate 添加分类]
     * @return [type] [description]
     */
    public function add_cate()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $param['created_time'] = time();
            $param['updated_time'] = time();
            $cate = new ProductCateModel();
            $flag = $cate->insertCate($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        return $this->fetch();
    }


    /**
     * [edit_cate 编辑分类]
     * @return [type] [description]
     */
    public function edit_cate()
    {
        $cate = new ProductCateModel();

        if(request()->isAjax()){

            $param = input('post.');
            $param['updated_time'] = time();
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
        $flag = Db::name('product_cate')->where('id',$id)->setField(['status'=>config('delete_status')]);
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
        $status = Db::name('product_cate')->where('id',$id)->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('product_cate')->where('id',$id)->setField(['status'=>config('close_status')]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('product_cate')->where(array('id'=>$id))->setField(['status'=>config('normal_status')]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }  

    /*****************************产品及服务*****************************/

    //产品及服务列表
    public function index(){
    	$key = input('key');
        $map = [];
        $map['think_product.status'] = array('neq',config('delete_status'));
        if($key&&$key!==""){
            $map['product_name'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('product')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $article = new ProductModel();
        $lists = $article->getProductByWhere($map, $Nowpage, $limits);
        foreach ($lists as $k => $value) {
        	$lists[$k]['created_time'] = date('Y-m-d H:i:s',$value['created_time']);
        	$lists[$k]['updated_time'] = date('Y-m-d H:i:s',$value['updated_time']);
        }
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('count', $count); 
        $this->assign('val', $key);
        if(input('get.page')){
            return json($lists);
        }
        return $this->fetch();
    }

    //添加产品服务
    public function add_product(){
    	if(request()->isAjax()){
            $param = input('post.');
            $param['created_time'] = time();
            $param['updated_time'] = time();
            $article = new ProductModel();
            $flag = $article->insertProduct($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $cate = new ProductCateModel();
        $this->assign('cate',$cate->getAllCate());
        return $this->fetch();
    }

    /**
     * [edit_product 编辑产品服务]
     * @return [type] [description]
     */
    public function edit_product()
    {
        $product = new ProductModel();     
        if(request()->isAjax()){

            $param = input('post.');         
            $flag = $product->updateProduct($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $cate = new ProductCateModel();
        $this->assign('cate',$cate->getAllCate());
        $this->assign('product',$product->getOneProduct($id));
        return $this->fetch();
    }

     /**
     * [del_product 删除陵园风景]
     * @return [type] [description]
     */
    public function del_product()
    {
        $id = input('param.id');
        $flag = Db::name('product')->where('id',$id)->setField(['status'=>config('delete_status')]);
        if($flag){
        	return json(['code' =>1, 'data' =>'', 'msg' => '删除成功']);
        }else{
        	return json(['code' =>0, 'data' =>'', 'msg' => '删除失败']);
        }
    }

     /**
     * [scenery_state 陵园风景状态]
     * @return [type] [description]
     */
    public function product_state()
    {
        $id=input('param.id');
        $status = Db::name('product')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==config('normal_status'))
        {
            $flag = Db::name('product')->where(array('id'=>$id))->setField(['status'=>config('close_status')]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('product')->where(array('id'=>$id))->setField(['status'=>config('normal_status')]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }

}