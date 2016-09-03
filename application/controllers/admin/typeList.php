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
        $m = 'kerfans';
        $this -> load -> model('admin_model','ref');
        $res = $this ->ref-> quen($m);
        $this->display('admin/addType.tpl');
    }
    //分类列表
    public function type_list()
    {


        $this->display('admin/type_list.tpl');
    }
}