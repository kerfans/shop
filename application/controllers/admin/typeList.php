<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 分类列表
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class TypeList extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('type_model','type');
    }
    //添加分类列表
    public function index()
    {
        // $m = 'admin';
        // $this -> load -> model('admin_model','ref');
        // $res = $this ->ref-> quen($m);
        if(!$_POST){
            $this->display('admin/addType.tpl');
        }else{
            $this->session->set_userdata(array('aid'=>'1'));
            //dd($_POST);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('typename', '类型名称', 'trim|required|is_unique[ecs_point_goods_type.name]');
            $this->form_validation->set_message('required', '%s必须');
            $this->form_validation->set_message('is_unique','%s已被使用');
            $this->form_validation->set_rules('classid','所属分类','callback_class_check');
            if ($this->form_validation->run() == FALSE)
            {
                $this->display('admin/addType.tpl');        
            }else{
                $typename = $this->input->post('typename');
                $classid=$this->input->post('classid');
                $data=array(
                    'class'=>$classid,
                    'name'=>$typename,
                    'status'=>1,
                    'ctime'=>time(),
                    'caid'=>$this->session->userdata('aid')
                );
                $insert_id=$this->type->insert($data);
                if($insert_id)
                {
                    echo '<meta charset="utf-8"/><script>alert("添加成功");</script>';
                    redirect('admin/typeList/type_list','refresh');          
                }else{
                    echo '<meta charset="utf-8"/><script>alert("添加失败");</script>';
                    redirect('admin/typeList/index','refresh');
                }
                
            }
        }
    }


    //分类列表
    public function type_list()
    {
        $res=$this->type->select('id,class,name','','status desc,id asc','');
        $entity=array();
        $virtual=array();
        // dd($res);
        // exit;
        $entitynum=1;
        $virtualnum=1;
        foreach($res as $k=>$v)
        {     
            if($v->class==1){
                array_push($entity,$v);
                $v->num=$entitynum;
                $entitynum++;
            }elseif($v->class==2){
                array_push($virtual,$v);
                $v->num=$virtualnum;
                $virtualnum++;
            }

        }
        //dd($virtual);
        $this->assign('entity',$entity);
        $this->assign('virtual',$virtual);

        $this->display('admin/type_list.tpl');
    }

    //不能添加虚拟验证
    public function class_check($int) {  
        if($int == '2') {  
            $this -> form_validation -> set_message('class_check' , '不能添加虚拟');  
            return false;  
        } else {  
            return true;  
        }  
    }  
    //修改类型
    public function type_update($id)
    {     
        $res=$this->type->select('*','id='.$id,'','');
        $caid=$res[0]->caid;
        $maid=$res[0]->maid;
        $this->load->model('admin_model','admin');
        $caname=$this->admin->selectName($caid)[0]->name;
        //dd($caname);
        if(!$maid){
            $maname='无';
        }else if($maid==$caid){
            $maname=$caname;
        }else{
            $maname=$this->admin->selectName($maid);
        }
        $this->assign('caname',$caname);
        $this->assign('maname',$maname);
        $this->assign('typeinfo',$res[0]);
        if(!$_POST)
        {       
            $this->display('admin/updateType.tpl');
        }else{
            $this->session->set_userdata(array('aid'=>'1'));
            //dd($_POST);
            $typename = $this->input->post('typename');
            $classid=$this->input->post('tid');
            $status=$this->input->post('status');
            $this->load->library('form_validation');
            if(trim($typename)!==$res[0]->name)
            {
                $this->form_validation->set_rules('typename', '类型名称','trim|required|is_unique[ecs_point_goods_type.name]');
                $this->form_validation->set_message('is_unique','%s已被使用');
            }else{
                $this->form_validation->set_rules('typename', '类型名称', 'trim|required');
            }     
            $this->form_validation->set_message('required', '%s必须');
            $this->form_validation->set_rules('remark','备注','trim|max_length[12]');
            $this->form_validation->set_message('max_length','%s长度过长');           
            if ($this->form_validation->run() == FALSE)
            {          

                $this->display('admin/updateType.tpl');   
            }else{     
                $data=array(
                    'name'=>$typename,
                    'status'=>$status,
                    'mtime'=>time(),
                    'caid'=>$this->session->userdata('aid')
                );
                //dd($data);
                $affected_rows=$this->type->update($classid,$data);
                dd($affected_rows);
                exit;
                if($insert_id)
                {
                    echo '<meta charset="utf-8"/><script>alert("添加成功");</script>';
                    redirect('admin/typeList/type_list','refresh');          
                }else{
                    echo '<meta charset="utf-8"/><script>alert("添加失败");</script>';
                    redirect('admin/typeList/index','refresh');
                }
                
            }
            
        }
    }
}