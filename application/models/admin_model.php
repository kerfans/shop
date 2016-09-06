<?php
/**
 * 管理员操作表
 * User: kerfans
 * Date: 2016/9/3
 * Time: 21:38
 */
class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function quen($rm)
    {
        $res = $this->db->get_where('ecs_point_shop_admin',array('name' => $rm));
        //echo $this->db->last_query();
        return $res->result_array();
    }

    function selectName($aid){
        $data=$this->db->select('id,name')->get_where('ecs_point_shop_admin',array('id'=>$aid));
        return $data->result();
    }
}