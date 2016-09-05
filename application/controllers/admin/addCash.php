<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 添加虚拟代金券
 * User: 科帆
 * Date: 2016/9/1
 * Time: 11:20
 */
class AddCash extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('bonus_model','bouns');
    }
    //添加代金券商品
    public function index()
    {
        if(!$_POST){
            $this->assign('data',null);
            $this->display('admin/addCash.tpl');
        }else{
            //表单验证不为空
            $this->load->library('form_validation');
            $this->form_validation->set_rules('content','搜索内容','required');
            $this->form_validation->set_message('required','%s必须填写');
            if($this->form_validation->run() == FALSE)
            {
                $this->assign('data',null);
                $this->display('admin/addCash.tpl');
            }else{
                $type = $this->input->post('type');            //输入类型0ID ，1名称
                $content = $this->input->post('content');
                $res = $this -> bouns -> select_bonus($type,$content);
                $this -> assign('data', $res);
                $this->display('admin/addCash.tpl');
            }
        }
        //分页类
//        $m= $this->uri->segment(3)?$this->uri->segment(3):'0';
//        $number =  $this->counts->bonus_num(); //计算总记录数
//        $config['base_url'] ='http://shop.yaofang.cn/index.php/admin/addCash'; //导入分页类URL
//
//        $config['total_rows'] = $number;  //计算总记录数
//        $config['per_page'] = '5';         //每页显示的记录数
//        $config['first_link'] = '首页';
//        $config['last_link'] = '末页';
//        $config['full_tag_open'] = '<p>';
//        $config['full_tag_close'] = '</p>';
//
//        $this->pagination->initialize($config);      //初始化分类页
//
//        $data['goods']=$this->books_model->get_books($config['per_page'],$m);
//        $this->load->library('table');
//
//
//        $red = $this->pagination->create_links();
//
//        $this->assign('data',$res);
//        $this->assign('orderlist', $red);
//        $this->display('admin/addCash.tpl');

    }
    //编辑代金券商品
    public function edit_cash()
    {
        if(!$_POST){
            $type_id = $this->uri->segment(4);      //接收代金券ID
            $res = $this -> bouns ->select_bonus(0,$type_id);
            $this->assign('data', $res[0]);
            $this -> display('admin/edit_cash.tpl');
        }else{
            
        }
       
    }
}