<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 添加流量
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class AddFlus extends MY_Controller {
    //添加流量商品
    public function index()
    {
        function __construct()
        {
            parent::__construct();
        }

        $this->display('admin/addFlus.tpl');
    }
}