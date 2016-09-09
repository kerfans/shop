<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 兑换商品列表
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class ShowList extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('type_model','type');
        $this->load->model('goods_model','goods');
        $this->load->model('good_model','good');
        $this->load->model('bonus_model','bonus');
        $this->load->model('flus_model','flus');
    }
    //兑换商品总列表
    public function index()
    {
        $alltype=$this->type->select('id,name,class','status=1','id');
        //dd($alltype);
        $entity=array();
        $virtual=array();
        foreach($alltype as $v)
        {     
            if($v->class==1){
                array_push($entity,$v);              
            }elseif($v->class==2){
                array_push($virtual,$v);
            }
        }
        //dd($entity);
        //dd($virtual);
        //分类选择
        $this->assign('entitytype',$entity);
        $this->assign('virtualtype',$virtual);
        $where="";
        $order="";
        $pw="";
        $pagerows=5;
        if($_GET)
        {
            if($_GET['pid'])
            {
                $where.="and pg.pid={$_GET['pid']} ";
                $pw.="pid={$_GET['pid']}";
            }else{
                $pw.="pid=";
            }
            if($_GET['title'])
            {
                $where.='and pg.title like "%'.$_GET['title'].'%" ';
                $pw.="&title={$_GET['title']}";
            }else{
                $pw.="&title=";
            }
            if($_GET['class']!=0)
            {
                $where.="and pg.class={$_GET['class']} ";
                $pw.="&class={$_GET['class']}";
            }else{
                $pw.="&class=0";
            }
            if($_GET['type']!=0)
            {
                $where.="and pg.type={$_GET['type']} ";
                $pw.="&type={$_GET['type']}";
            }else{
                $pw.="&type=0";
            }
            if($_GET['sell']!=-1)
            {
                $where.="and pg.is_sale={$_GET['sell']} ";
                $pw.="&sell={$_GET['sell']}";
            }else{
                $pw.="&sell=-1";
            }
            if($_GET['del']!=-1)
            {
                $where.="and pg.is_del={$_GET['del']} ";
                $pw.="&del={$_GET['del']}";
            }else{
                $pw.="&del=-1";
            }
            if($_GET['cost_points']!='default')
            {
                $order.=", pg.cost_points {$_GET['cost_points']} ";
                $pw.="&cost_points={$_GET['cost_points']}";
            }else{
                $pw.="&cost_points=default";
            }
            if($_GET['sort']!='default')
            {
                $order.=", pg.sort {$_GET['sort']} ";
                $pw.="&sort={$_GET['sort']}";
            }else{
                $pw.="&sort=default";
            }
            if($_GET['stock_num']!='default')
            {
                $order.=", pg.stock_num {$_GET['stock_num']} ";
                $pw.="&stock_num={$_GET['stock_num']}";
            }else{
                $pw.="&stock_num=default";
            }
            if($_GET['sum_num']!='default')
            {
                $order.=", pg.sum_num {$_GET['sum_num']} ";
                $pw.="&sum_num={$_GET['sum_num']}";
            }else{
                $pw.="&sum_num=default";
            }
            if($_GET['atime']!='default')
            {
                $order.=", pg.atime {$_GET['atime']} ";
                $pw.="&atime={$_GET['atime']}";
            }else{
                $pw.="&atime=default";
            }

            if($where)
            {
                $where=substr($where,3);
            }
            if($order)
            {
                $order=substr($order,1);
            }
            if($order)
            {
                $order.=", pg.id asc";
            }else{
                $order.=" pg.id asc";
            }
            $join=" pg.tid=pgt.id and ";
            if($_GET['per_page']!=0)
            {
                $limit=$_GET['per_page'].','.$pagerows;
            }else{
                $limit='0,'.$pagerows;
            }
        }else{
            $order.=" pg.id asc";
            $join=" pg.tid=pgt.id ";
            $pw.="pid=&title=&class=0&type=0&sell=-1&del=0&cost_points=default&sort=default&stock_num=default&sum_num=default&atime=default&per_page=0";
            $limit='0,'.$pagerows;
        }
        
        //var_dump($where);
        //var_dump($order);
        //var_dump($pw);
        $count=$this->goods->getCount(str_replace('pg.','',$where))[0]->count;
        //dd($count);


        $goodsres=$this->goods->select('pg.id,pg.tid,pgt.name,pg.pid,pg.class,pg.title,pg.cost_points,pg.stock_num,pg.is_sale,pg.sort,pg.is_del,pg.is_hot,pg.is_new,pg.atime,pg.sum_num',$join.$where,$order,$limit,'ecs_point_goods_type pgt');

        $this->assign('goodsinfo',$goodsres);
        
        $this->load->library('pagination');
        

        $config=$this->getPageConfigInfo(base_url().'/index.php/admin/showList/index?'.$pw,$count,$pagerows,0,1);

        $this->pagination->initialize($config); 
        $fy=$this->pagination->create_links();
        $this->assign('page',$fy);
        
        $this->display('admin/showList.tpl');
    }

    /** 
     * 分页生成 
     * @param string $base_url  当前分页URL 
     * @param int $total_rows   数据总条数 
     * @param int $per_page     每页显示数据条数 
     * @param int $uri_segment  分页方法自动测定你 URI 的哪个部分包含页数 
     * @param int $cur_page     当前页码，用于条件查询时初始返回第一页 
     * @return mixed            分页信息 
     */  
    public function getPageConfigInfo($base_url = null, $total_rows = 0, $per_page = 0, $uri_segment = 0,$offset=0) {  
        $config = array();  
  
        if ($offset == 0) {  
            $cur_page = 1;  
        }  
  
        if(isset($cur_page)){  
            $config['cur_page'] = $cur_page;  
        }  
          
        //$config['base_url'] = site_url() . $base_url;  
        $config['base_url'] = $base_url;  
        $config['total_rows'] = $total_rows;  
  
        $config['per_page'] = $per_page;  
        $config['uri_segment'] = $uri_segment;  
        
        $config['page_query_string'] = TRUE;   


        $config['full_tag_open'] = "<table width='100%'> <tr  style=\"background-color:#eee;line-height:25px;\" align='right'><td>";  
        $config['full_tag_close'] = '</td></tr></table>';  
  
        $config['first_link'] = '首页';  
        $config['first_tag_open'] = ' <span class="page_link">[';  
        $config['first_tag_close'] = ']</span> ';  
  
        $config['last_link'] = '尾页';  
        $config['last_tag_open'] = ' <span class="page_link">[';  
        $config['last_tag_close'] = ']</span"> ';  
  
        $config['next_link'] = '下一页';  
        $config['next_tag_open'] = ' <span class="page_link">[';  
        $config['next_tag_close'] = ']</span"> ';  
  
        $config['prev_link'] = '上一页';  
        $config['prev_tag_open'] = '<span class="page_link">[';  
        $config['prev_tag_close'] = ']</span">';  
  
        $config['num_tag_open'] = ' <span class="page_link">[';  
        $config['num_tag_close'] = ']</span"> ';  
  
        $config['cur_tag_open'] = ' [<span style="color:red;font-weight:bold;">';  
        $config['cur_tag_close'] = '</span>] ';  
        return $config;  
    }  

    //修改兑换商品信息
    public function editGoods()
    {
        $class = $this->uri->segment(7);        //所属类别
        $tid   = $this->uri->segment(6);        //具体类型
        if($class == 2 && $tid == 1)
        {   //代金券编辑方法
            $res = $this->editCash();
            return $res;
        }elseif($class == 2 && $tid == 2)
        {   //流量编辑方法
            $res = $this->editFlus();
            return $res;
        }else
        {   //实体商品编辑方法
            $res = $this->editShi();
            return $res;
        }
        //$this -> display('admin/edit_goods.tpl');
    }
    //实体商品编辑
    public function editShi()
    {
        $id = $this->uri->segment(4);           //字段ID
        $goods_id = $this->uri->segment(5);     //获取商品ID
        $error = '';
        $filed = "id,class,name,status";              //查询分类表（类别ID，分类ID,名称，状态）
        $where = "class = 1";                         //默认为实体商品分类
        $rem = $this->type->select($filed,$where);    //获取当前所有分类
        $res = $this->good->shi_goods($goods_id,$id);
        //pp($res);
        $this->assign('data',$res); //商品信息
        $this->assign('types',$rem);//类别信息
        if(!$_POST){
            $this->assign('errors',$error);
            $this->display('admin/goods_edit.tpl');
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
                $this->display('admin/goods_edit.tpl');
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
                        $this->display('admin/goods_edit.tpl');
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
                            $this->display('admin/goods_edit.tpl');
                        }else{
                            //生成缩略图名称
                            $big_pic =UPLOADS_URL.date("Y/m/d").'/'.$data['upload_data']['raw_name'].'_big'.$data['upload_data']['file_ext'];
                            $min_pic =UPLOADS_URL.date("Y/m/d").'/'.$data['upload_data']['raw_name'].'_min'.$data['upload_data']['file_ext'];
                            //删除原尺寸图
                            unlink($data['upload_data']['full_path']);
                            // $message['picture'] = $min_pic;   //获取上传文件名称
                            
                            
                            $rm = $this->good->onePic($id);     //查询商品表图片信息
                            $rm[0] = $big_pic;                  //替换商品表第一张的展示图为此上传的图片500*500原图
                           // $rm[0]['thumb_url'] = $min_pic;      //替换原图第一张的展示图为此上传的图片500*500原图
                            $message['picture'] = implode('  ',$rm);
                            $message['class'] = 1;            //默认实体类别
                            $red = $this->good->update_goods($id,$message);    //更新实体商品列表
                        }
                    }
                }else{
                    //没有图片上传则直接更新信息。
                    $message['class'] = 1;            //默认实体类别
                    $red = $this->good->update_goods($id,$message);    //存入到商品列表
                }
                if($red)
                {
                    echo '<meta charset="utf-8"/><script>alert("更新成功");</script>';
                    redirect('admin/showList','refresh');
                }else{
                    echo '<meta charset="utf-8"/><script>alert("更新失败");</script>';
                    redirect('admin/showList','refresh');
                }
            }
        }
    }
    //虚拟商品-代金券编辑
    public function editCash()
    {
        $error = '';
        $id = $this->uri->segment(4);           //字段ID
        $goods_id = $this->uri->segment(5);     //获取商品ID
        $res = $this->bonus->cash_goods($goods_id,$id);   //获取代金券信息
        //pp($res);
        $this->assign('data',$res[0]);
        $this->assign('da',$res[1]);
        if(!$_POST){
            $this->assign('errors',$error);
            $this->display('admin/cash_edit.tpl');
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
            //pp($message);
            if($this->form_validation->run() == FALSE)
            {
                $this->assign('errors',$error);
                $this->display('admin/cash_edit.tpl');
            }else {
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
                        $this->display('admin/cash_edit.tpl');
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
                        $config['width']     = 500;
                        $config['height']   = 500;

                        $this->image_lib->initialize($config);
                        //  $this->load->library('image_lib', $config);

                        if ( !$this->image_lib->resize())
                        {
                            $error =  $this->image_lib->display_errors();
                            $this->assign('errors',$error);
                            $this->display('admin/cash_edit.tpl');
                        }else {
                            //生成缩略图名称
                            $min_pic = UPLOADS_URL . date("Y/m/d") . '/' . $data['upload_data']['raw_name'] . '_thumb' . $data['upload_data']['file_ext'];
                            //删除原尺寸图
                            unlink($data['upload_data']['full_path']);
                            $message['picture'] = $min_pic;   //获取上传文件名称
                            $red = $this->bonus->update_cash($id, $message);    //存入到商品列表
                        }
                    }
                }else{

                    $red = $this->bonus->update_cash($id, $message);    //存入到商品列表
                }
                if($red)
                {
                    echo '<meta charset="utf-8"/><script>alert("更新成功");</script>';
                    redirect('admin/showList','refresh');
                }else{
                    echo '<meta charset="utf-8"/><script>alert("更新失败");</script>';
                    redirect('admin/showList','refresh');
                }
            }
        }

    }
    //虚拟商品-流量编辑
    public function editFlus()
    {
        $error = '';
        $id = $this->uri->segment(4);           //字段ID
        $goods_id = $this->uri->segment(5);     //获取商品ID
        $res = $this->flus->all_flus($goods_id,$id);   //获取代金券信息
        $this->assign('data',$res[0]);
        $this->assign('da',$res[1]);
        if(!$_POST){
            $this->assign('errors',$error);
            $this->display('admin/edit_flus.tpl');
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
            //pp($message);
            if($this->form_validation->run() == FALSE)
            {
                $this->assign('errors',$error);
                $this->display('admin/edit_flus.tpl');
            }else {
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
                        $this->display('admin/edit_flus.tpl');
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
                        $config['width']     = 500;
                        $config['height']   = 500;

                        $this->image_lib->initialize($config);
                        //  $this->load->library('image_lib', $config);

                        if ( !$this->image_lib->resize())
                        {
                            $error =  $this->image_lib->display_errors();
                            $this->assign('errors',$error);
                            $this->display('admin/edit_flus.tpl');
                        }else {
                            //生成缩略图名称
                            $min_pic = UPLOADS_URL . date("Y/m/d") . '/' . $data['upload_data']['raw_name'] . '_thumb' . $data['upload_data']['file_ext'];
                            //删除原尺寸图
                            unlink($data['upload_data']['full_path']);
                            $message['picture'] = $min_pic;   //获取上传文件名称
                            $red = $this->flus->update_cash($id, $message);    //存入到商品列表
                        }
                    }
                }else{

                    $red = $this->flus->update_cash($id, $message);    //存入到商品列表
                }
                if($red)
                {
                    echo '<meta charset="utf-8"/><script>alert("更新成功");</script>';
                    redirect('admin/showList','refresh');
                }else{
                    echo '<meta charset="utf-8"/><script>alert("更新失败");</script>';
                    redirect('admin/showList','refresh');
                }
            }
        }
    }


    //删除兑换商品
    public function delete()
    {
        $id = $this->uri->segment(4);     //获取商品ID
        $res = $this->goods->delete($id); //删除商品
        if($res)
        {
            echo '<meta charset="utf-8"/><script>alert("删除成功");</script>';
            redirect('admin/showList','refresh');
        }else{
            echo '<meta charset="utf-8"/><script>alert("删除失败");</script>';
            redirect('admin/showList','refresh');
        }
    }
}