<?php if (!defined('BASEPATH')) exit('No direct access allowed.');
/**
 * 中间键控制器
 * 功能：引入Smarty框架
 *       验证登录状态
 */
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //pp($this->session->all_userdata());
        if($this->uri->segment(1) != 'admin_login' ){
            if(!$this->session->userdata('name')){
                redirect('admin_login','refresh');
            }
        }
    }

    public function assign($key,$val) {
        $this->cismarty->assign($key,$val);
    }

    public function display($html) {
        $this->cismarty->display($html);
    }
} 