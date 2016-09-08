<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台登录/退出控制器
 * User: w
 * Date: 2016/9/1
 * Time: 11:20
 */
class Admin_login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('adminLogin_model','login');      //登录验证
    }

    public function index()
    {

        if(!$_POST)
        {
            $this->display('admin_login.tpl');
        }else{
            //验证验证码
            $code = $this->input->post('code');
            $code2 = strtolower($this->session->userdata('code'));
            if(strtolower($code) != $code2){
                echo '<meta charset="utf-8"/><script>alert("对不起验证码错误，请重新输入");</script>';
                redirect('admin_login','refresh');
                die;
            }
            //验证用户信息
            $unres = $this->input->post();
            unset($unres['code']);
            $res = $this->login->check_admin($unres);
            if($res){
                //登录成功存用户信息到session
                $this->session->set_userdata($res);
                echo '<meta charset="utf-8"/><script>alert("欢迎您--'.$this->input->post('name').' 登录");</script>';
                redirect('admin/showList','refresh');
            }else{
                echo '<meta charset="utf-8"/><script>alert("登录失败，请重新输入");</script>';
                redirect('admin_login','refresh');
            }
        }
    }
    //引入验证码类
    public function get_code(){
        $this->load->helper('yzm');
        $captcha = new Captcha();
        $code = $captcha -> getCaptcha();
        $this->session->set_userdata('code', $code);
        $captcha->showImg();
    }
    //退出控制器
    public function loginOut()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('class');
        echo '<meta charset="utf-8"/><script>alert("感谢您的登录，再见");</script>';
        redirect('admin_login','refresh');
    }
}