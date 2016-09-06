<?php
/**
 * 积分商城总商品
 * User: w
 * Date: 2016/9/6
 * Time: 10:25
 */
class Goods_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    /**
     * 添加商品到积分商城列表
     * $message   关联数组
     * return  1（插入数据成功）
     */
    function goods($message)
    {
        $message['atime'] = time();
        $res = $this->db->insert('ecs_point_goods', $message);
        return $res;
    }

}