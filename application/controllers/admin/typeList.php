<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 分类列表
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class TypeList extends MY_Controller {
    //添加分类列表
    public function index()
    {
        function __construct()
        {
            parent::__construct();
        }

        $data['title'] = '积分商城';
        $data['num'] = 'hello,world';

        $this->assign('data',$data);
        $this->assign('tmp','admin下的文件');
        $this->display('admin/addType.tpl');
    }
    //编辑实体商品信息
    public function type_list()
    {


        $this->display('admin/type_list.tpl');
    }
}