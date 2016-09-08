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
        $this->load->model('bonus_model','bouns');      //代金券
        $this->load->model('goods_model','goods');      //商品总表
        $this->load->model('type_model','type');        //类型
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
        $error = '';
        $type_id = $this->uri->segment(4);              //接收代金券ID
        $res = $this->bouns->select_bonus(0,$type_id);  //获取当前代金券信息
//        $filed = "id,class,name,status";                //查询分类表（类别ID，分类ID,名称，状态）
//        $where = "class = 2";                           //默认为虚拟商品分类
//        $rem = $this->type->select($filed,$where);      //获取当前所有分类
//        $this->assign('types',$rem);
        $this->assign('data', $res[0]);
        if(!$_POST){
            $this->assign('errors',$error);
            $this->display('admin/edit_cash.tpl');
        }else{
            //表单验证不为空
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','名称','required');
            $this->form_validation->set_rules('stock_num','库存数量','required');
            $this->form_validation->set_rules('sort','权重','required');
            $this->form_validation->set_rules('describe','说明描述','required');
            $this->form_validation->set_rules('cost_points','兑换积分','required');
            $this->form_validation->set_message('required','%s必须填写');
            if($this->form_validation->run() == FALSE)
            {
                $this->assign('errors',$error);
                $this->display('admin/edit_cash.tpl');
            }else {
                //上传图片处理
                $config['upload_path']      = UPLOADS_URL.date("Y/m/d");
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 2048;
                $config['max_width']        = 1024;
                $config['max_height']       = 768;
                $config['encrypt_name']     = TRUE;
                if(!file_exists(UPLOADS_URL.date("Y/m/d"))){
                    mkdir(UPLOADS_URL.date("Y/m/d"),0777,true);
                }

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('picture'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->assign('errors',$error);
                    $this->display('admin/edit_cash.tpl');
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    //对上传的图片处理
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path'];
                    $config['new_image'] = $data['upload_data']['full_path'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 750;
                    $config['height']   = 500;

                    $this->image_lib->initialize($config);
                  //  $this->load->library('image_lib', $config);

                    if ( !$this->image_lib->resize())
                    {
                        $error =  $this->image_lib->display_errors();
                        $this->assign('errors',$error);
                        $this->display('admin/edit_cash.tpl');
                    }else{
                        //生成缩略图名称
                        $min_pic =UPLOADS_URL.date("Y/m/d").'/'.$data['upload_data']['raw_name'].'_thumb'.$data['upload_data']['file_ext'];
                        //删除原尺寸图
                        unlink($data['upload_data']['full_path']);

                        $message = $this->input->post();  //接收所有表单数据
                        $message['picture'] = $min_pic;   //获取上传文件名称
                        $message['class'] = 2;            //默认虚拟类别
                        $message['tid'] = 1;              //默认代金券分类
                        $this->goods->goods($message);    //存入到商品列表
                    }
                }
            }
        }
    }
}