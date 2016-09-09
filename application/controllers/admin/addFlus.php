<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 添加流量
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class AddFlus extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('flus_model','flus');
        $this->load->model('goods_model','goods');
        $this->load->model('type_model','type');
    }
    //添加流量商品
    function index()
    {
        $error = '';
        if(!$_POST){
            $this->assign('errors',$error);
            $this->display('admin/addFlus.tpl');
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
                $this->display('admin/addFlus.tpl');
            }else{
                //上传图片处理
                $config['upload_path']      = UPLOADS_URL.'/flus/'.date("Y/m/d");
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 2048;
                $config['max_width']        = 1024;
                $config['max_height']       = 768;
                $config['encrypt_name']     = TRUE;
                if(!file_exists(UPLOADS_URL.'/flus/'.date("Y/m/d"))){
                    mkdir(UPLOADS_URL.'/flus/'.date("Y/m/d"),0777,true);
                }

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('picture'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->assign('errors',$error);
                    $this->display('admin/addFlus.tpl');
                }
                else {
                    $data = array('upload_data' => $this->upload->data());
                    //对上传的图片处理
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path'];
                    $config['new_image'] = $data['upload_data']['full_path'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 750;
                    $config['height'] = 500;

                    $this->image_lib->initialize($config);
                    if (!$this->image_lib->resize()) {
                        $error = $this->image_lib->display_errors();
                        $this->assign('errors', $error);
                        $this->display('admin/addFlus.tpl');
                    } else {
                        //生成缩略图名称和路径
                        $min_pic =UPLOADS_URL.date("Y/m/d").'/'.$data['upload_data']['raw_name'].'_thumb'.$data['upload_data']['file_ext'];
                        //删除原图
                        unlink($data['upload_data']['full_path']);

                        $message = $this->input->post();  //接收所有表单数据
                        $message['picture'] = $min_pic;   //获取上传文件名称
                        $message['class'] = 2;            //默认虚拟类别
                        $message['tid'] = 2;              //默认流量分类

                        $mes['title'] = $message['title'];
                        $mes['operator'] = $message['operator'];
                        $mes['flow'] = $message['flow'];
                        $mes['status'] = $message['is_sale'];
                        $mes['describe'] = $message['describe'];
                        $res = $this->flus->addFlus($mes);       //添加到流量表
                        $message['pid'] = $res;
                        unset($message['flow']);
                        unset($message['operator']);
                        $res = $this->goods->goods($message);    //存入到商品列表
                        if($res)
                        {
                            echo '<meta charset="utf-8"/><script>alert("添加成功");</script>';
                            redirect('admin/addFlus','refresh');
                        }else{
                            echo '<meta charset="utf-8"/><script>alert("添加失败");</script>';
                            redirect('admin/addFlus','refresh');
                        }
                    }
                }
            }
        }
    }
}