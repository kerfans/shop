<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 添加实体商品
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class AddGoods extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('good_model','good');      //实体商品表
        $this->load->model('goods_model','goods');      //实体商品表
        $this->load->model('type_model','type');        //类型
    }
    //添加实体商品
    public function index()
    {
        if(!$_POST)
        {
            $this->assign('data',null);
            $this->display('admin/addGoods.tpl');
        }else{
            //表单验证不为空
            $this->load->library('form_validation');
            $this->form_validation->set_rules('content','搜索内容','required');
            $this->form_validation->set_message('required','%s必须填写');
            if($this->form_validation->run() == FALSE)
            {
                $this->assign('data',null);
                $this->display('admin/addGoods.tpl');
            }else{
                $type = $this->input->post('type');            //输入类型0，ID ，1名称
                $content = $this->input->post('content');
                $res = $this -> good -> select_good($type,$content);
                $this -> assign('data', $res);
                $this->display('admin/addGoods.tpl');
            }
        }
    }
    //编辑实体商品
    public function edit_goods()
    {
        $error = '';
        $type_id = $this->uri->segment(4);              //接收商品ID
        $res = $this->good->all_message($type_id);      //获取当前商品所有信息
        $filed = "id,class,name,status";              //查询分类表（类别ID，分类ID,名称，状态）
        $where = "class = 1";                         //默认为实体商品分类
        $rem = $this->type->select($filed,$where);    //获取当前所有分类
        //pp($rem);
        $this->assign('data', $res);
        $this->assign('types',$rem);
        if(!$_POST){
            $this->assign('errors',$error);
            $this->display('admin/edit_goods.tpl');
        }else{
            //表单验证不为空
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','名称','required');
            $this->form_validation->set_rules('stock_num','库存数量','required');
            $this->form_validation->set_rules('sort','权重','required');
            $this->form_validation->set_rules('describe','说明描述','required');
            $this->form_validation->set_rules('cost_points','兑换积分','required');
            $this->form_validation->set_message('required','%s必须填写');
            $message = $this->input->post();  //接收所有表单数据
            if($this->form_validation->run() == FALSE)
            {
                $this->assign('errors',$error);
                $this->display('admin/edit_goods.tpl');
            }else{
                //判断是否有文件上传
                if (!empty($_FILES['picture']['tmp_name']))
                {
                    //上传图片处理
                    $config['upload_path']      = UPLOADS_URL.date("Y/m/d");
                    $config['allowed_types']    = 'gif|jpg|png';
                    $config['max_size']         = 2048;
                    $config['max_width']        = 0;
                    $config['max_height']       = 0;
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
                        //对上传的图片处理 500*500大小
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $data['upload_data']['full_path'];
                        $config['new_image'] = $data['upload_data']['file_path'];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['thumb_marker'] = '_big';
                        $config['width']    = 500;
                        $config['height']   = 500;

                        //对上传的图片处理 100*100大小
                        $configm['image_library'] = 'gd2';
                        $configm['source_image'] = $data['upload_data']['full_path'];
                        $configm['new_image'] = $data['upload_data']['file_path'];
                        $configm['thumb_marker'] = '_min';
                        $configm['create_thumb'] = TRUE;
                        $configm['maintain_ratio'] = TRUE;
                        $configm['width']    = 100;
                        $configm['height']   = 100;

                        $this->load->library('image_lib');
                        //生成100*100
                        $this->image_lib->initialize($configm);
                        $this->image_lib->resize();
                        //生成500*500
                        $this->image_lib->initialize($config);
                        if(!$this->image_lib->resize()) {
                            $error = $this->image_lib->display_errors();
                            $this->assign('errors', $error);
                            $this->display('admin/edit_cash.tpl');
                        }else{
                            //生成缩略图名称
                            $big_pic =UPLOADS_URL.date("Y/m/d").'/'.$data['upload_data']['raw_name'].'_big'.$data['upload_data']['file_ext'];
                            $min_pic =UPLOADS_URL.date("Y/m/d").'/'.$data['upload_data']['raw_name'].'_min'.$data['upload_data']['file_ext'];
                            //删除原尺寸图
                            unlink($data['upload_data']['full_path']);
                            // $message['picture'] = $min_pic;   //获取上传文件名称
                            $rm = $this->good->goods_pics($this->input->post('goods_id'));   //查询原图信息
                            $rm[0]['img_url'] = $big_pic;        //替换原图第一张的展示图为此上传的图片500*500原图
                            $rm[0]['thumb_url'] = $min_pic;      //替换原图第一张的展示图为此上传的图片500*500原图
                            foreach ($rm as $v)
                            {
                                $ms[] = $v['thumb_url'];
                            }
                            $message['picture'] = implode('  ',$ms);
                            $message['class'] = 1;            //默认实体类别
                            $red = $this->goods->goods($message);    //存入到商品列表

                        }
                    }
                }else{
                    $rm = $this->good->goods_pics($this->input->post('goods_id'));   //查询原图信息
                    foreach ($rm as $v)
                    {
                        $ms[] = $v['thumb_url'];
                    }
                    $message['picture'] = implode('  ',$ms);
                    //没有图片上传则直接上传信息。
                    $message['class'] = 1;            //默认实体类别
                    $red = $this->goods->goods($message);    //存入到商品列表
                }
            }
            if($red)
            {
                echo '<meta charset="utf-8"/><script>alert("添加成功");</script>';
                redirect('admin/addGoods','refresh');
            }else{
                echo '<meta charset="utf-8"/><script>alert("添加失败");</script>';
                redirect('admin/addGoods','refresh');
            }
        }
    }
}