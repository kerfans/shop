<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 广告轮播列表
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class AdsList extends MY_Controller {
    //轮播添加
    public function index()
    {
        function __construct()
        {
            parent::__construct();
        }



        $this->display('admin/addAds.tpl');
    }
    //轮播图列表
    public function ads_list()
    {



        $this->display('admin/ads_list.tpl');
    }
}