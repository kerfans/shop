<?php
/**
 * Created by PhpStorm.
 * User: kerfans
 * Date: 2016/9/3
 * Time: 21:38
 */
class Admin_model extends CI_Model {

    function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
    function quen($rm)
    {
        $res = $this->db->get_where('ecs_point_shop_admin',array('name' => $rm));
        return $res->result_array();
    }
}