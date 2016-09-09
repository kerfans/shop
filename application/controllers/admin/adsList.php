<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 广告轮播列表
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class AdsList extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('ad_model','ad');
    }
    //轮播添加
    public function index()
    {
        if(!$_POST){
            $error='';
            $this->assign('errors',$error);
            $this->display('admin/addAds.tpl');
        }else{
            //dd($_POST);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', '广告标题', 'trim|required|max_length[12]');
            $this->form_validation->set_rules('url','链接地址','trim|required|callback_url_check');
            $this->form_validation->set_message('required', '%s必须');
            $this->form_validation->set_message('max_length','%s长度过长');
            if ($this->form_validation->run() == FALSE)
            {
                $this->display('admin/addAds.tpl');        
            }else{
                //上传图片处理
                $config['upload_path']      = UPLOADS_URL.'ad';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']         = 2048;
                $config['max_width']        = 1600;
                $config['max_height']       = 800;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);             
                if(!file_exists(UPLOADS_URL.'ad')){
                    mkdir(UPLOADS_URL.'ad',0777,true);
                }
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    if($error['error']=='<p>请选择文件上传</p>')
                    {
                        $error['error']='<p>必须上传一张广告图片</p>';
                    }
                    $this->assign('errors',$error);
                    $this->display('admin/addAds.tpl');
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    //dd($data);
                    //对上传的图片处理
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path'];
                    //$config['new_image'] = $data['upload_data']['full_path'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 750;
                    $config['height']   = 500;
                    $this->image_lib->initialize($config);
                
                    if ( !$this->image_lib->resize())
                    {
                        $error =  $this->image_lib->display_errors();
                        $this->assign('errors',$error);
                        $this->display('admin/addAds.tpl');
                    }else{
                        //生成缩略图名称
                        $min_pic = $data['upload_data']['raw_name'].'_thumb'.$data['upload_data']['file_ext'];
                        //删除原图
                        unlink($data['upload_data']['full_path']);                   
                        //dd($min_pic);
                        $data = $this->input->post();  //接收所有表单数据
                        $data['type']=1;//默认轮播type=1
                        $data['picture'] = 'ad/'.$min_pic;   
                        $data['aaid'] = $this->session->userdata('id'); 
                        $data['atime']=time();           
                        $insert_id=$this->ad->insert($data);
                        //dd($insert_id);
                        if($insert_id)
                        {
                            echo '<meta charset="utf-8"/><script>alert("添加成功");</script>';
                            redirect('admin/adsList/ads_list','refresh');          
                        }else{
                            echo '<meta charset="utf-8"/><script>alert("添加失败");</script>';
                            redirect('admin/adsList/index','refresh');
                        }
                    }
                }
                
            }
        }

        
    }

    //url正则验证
    public function url_check($str)
    {
        $pattern="/^(http|ftp|https):\/\/([\w-]+\.)+[\w-]+(\/[\w- \.\/\?%\&=]*)?$/";
        if(!preg_match($pattern,$str)) {  
            $this -> form_validation -> set_message('url_check' , '链接地址格式错误');  
            return false;  
        } else {  
            return true;  
        }  
    }
    //轮播图列表
    public function ads_list()
    {
        $res=$this->ad->select('id,title,picture,url,status','type=1','status desc,sort desc,id');
        //dd($res);
        $num=1;
        foreach($res as $v)
        {
            $v->num=$num;
            $v->picture=substr($v->picture,3);
            $num++;
        }
        $this->assign('adinfo',$res);
        $this->display('admin/ads_list.tpl');
    }
    //轮播更改
    public function ad_update($id)
    {
        $res=$this->ad->select('*','id='.$id);
        //dd($res);
        $aaid=$res[0]->aaid;
        $this->load->model('admin_model','admin');
        $aaname=$this->admin->selectName($aaid)[0]->name;
        $this->assign('aaname',$aaname);
        $this->assign('adinfo',$res[0]);      
        if(!$_POST)
        {
            $error='';
            $this->assign('errors',$error);
            $this->display('admin/updateAd.tpl');
        }else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', '广告标题', 'trim|required|max_length[12]');
            $this->form_validation->set_rules('url','链接地址','trim|required|callback_url_check');
            $this->form_validation->set_rules('sort','权重排序','trim|required|integer');
            $this->form_validation->set_message('required', '%s必须');
            $this->form_validation->set_message('max_length','%s长度过长');
            $this->form_validation->set_message('integer','%s必须整数');
            if ($this->form_validation->run() == FALSE)
            {          
                $this->display('admin/updateAd.tpl');   
            }else{
                //上传图片处理
                $config['upload_path']      = UPLOADS_URL.'ad';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']         = 2048;
                $config['max_width']        = 1600;
                $config['max_height']       = 800;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);  
                if(!file_exists(UPLOADS_URL.'ad')){
                    mkdir(UPLOADS_URL.'ad',0777,true);
                }
                $old_pic=$this->input->post('oldimg');
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    if($error['error']=='<p>请选择文件上传</p>')
                    {
                        $new_pic=$old_pic;
                    }else{
                        $this->assign('errors',$error);
                        $this->display('admin/updateAd.tpl');
                        die;
                    }
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    //dd($data);
                    //对上传的图片处理
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path'];
                    //$config['new_image'] = $data['upload_data']['full_path'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 750;
                    $config['height']   = 500;
                    $this->image_lib->initialize($config);
                    if ( !$this->image_lib->resize())
                    {
                        $error =  $this->image_lib->display_errors();
                        $this->assign('errors',$error);
                        $this->display('admin/updateAd.tpl');
                    }else{
                        //生成缩略图名称
                        $new_pic = 'ad/'.$data['upload_data']['raw_name'].'_thumb'.$data['upload_data']['file_ext'];
                        //删除原图
                        unlink($data['upload_data']['full_path']); 
                        //删除旧图
                        unlink($data['upload_data']['file_path'].substr($old_pic,3));
                    }
                }                  
                //dd($new_pic);exit;
                $adid=$this->input->post('id');
                $data=array(
                    'title'=>$this->input->post('title'),
                    'url'=>$this->input->post('url'),
                    'status'=>$this->input->post('status'),
                    'picture'=>$new_pic,
                    'sort'=>$this->input->post('sort')
                );
                $affected_rows=$this->ad->update($adid,$data);
                if($affected_rows==1||$affected_rows==0)
                {
                    echo '<meta charset="utf-8"/><script>alert("更改成功");</script>';
                    redirect('admin/adsList/ads_list','refresh');          
                }else{
                    echo '<meta charset="utf-8"/><script>alert("更改失败");</script>';
                    redirect('admin/adsList/ad_update/'.$adid,'refresh');
                }
             
                 
            }
        }
    }
    //删除
    public function ad_del($id)
    {
        $picture=$this->ad->select('picture','id='.$id)[0]->picture;
        //dd($picture);
        unlink(UPLOADS_URL.$picture);
        $this->ad->del($id);
        echo '<meta charset="utf-8"/><script>alert("删除成功");</script>';
        redirect('admin/adsList/ads_list','refresh');
    }
}