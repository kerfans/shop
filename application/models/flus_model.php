<?php
/**
 * 流量操作模型
 * User: w
 * Date: 2016/9/5
 * Time: 10:31
 */
class Flus_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * 添加到流量表
     * $message 传入关联数组
     * return 返回上一次添加的ID
     */
    function addFlus($message)
    {
        $message['atime'] = time();
        $this->db->insert('ecs_point_goods_traffic', $message);
        return $this->db->insert_id();
    }
    /**
     * 查询原代金券表（ecs_bonus_type）中的信息
     * $type 类别（0，根据代金券ID查询，1根据代金券名称查询）
     * $content  查询输入的内容（ID或者名称）
     * return 查询结果数组
     */
    function select_bonus($type,$content)
    {
        $this->db->select('type_id,type_name,type_money,send_type,expire_type,use_start_date,use_end_date,min_goods_amount,mod_type,prescription_type,is_all,dealer_id');
        $this->db->from('ecs_bonus_type');
        if($type == 0){
            $this->db->where("type_id",$content);
        }else{
            $this->db->like("type_name",$content);
        }
        $this->db->limit(50);
        $ref = $this->db->get();
        return $ref -> result_array();
    }
    /**
     * 查询原代金券表（ecs_bonus_type）信息数量
     * return 查询结果数量
     */
    function bonus_num()
    {
        $rem = $this->db->count_all_results('ecs_bonus_type');
        return $rem;
    }


}