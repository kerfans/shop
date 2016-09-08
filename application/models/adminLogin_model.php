<?php
/**
 * 后台登录
 * User: kerfans
 * Date: 2016/9/3
 * Time: 21:38
 */
class AdminLogin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * 后台登录验证查询
     * $parm 用户名密码数组
     * return 返回查询结果
     */
    function check_admin($parm)
    {
        $this->db->select('id,name,class,status');
        $this->db->from('ecs_point_shop_admin');
        $this->db->where($parm);
        $res = $this->db->get()->row_array();
        return $res;
    }
}