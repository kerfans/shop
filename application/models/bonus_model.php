<?php
/**
 * 代金券操作模型
 * User: w
 * Date: 2016/9/5
 * Time: 10:31
 */
class Bonus_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * 查询原代金券表（ecs_bonus_type）中的信息
     * $type 类别（0，根据代金券ID查询，1根据代金券名称查询）
     * $content  查询输入的内容（ID或者名称）
     * return 查询结果数组
     */
    function select_bonus($type,$content)
    {
       $this->db->select('bt.type_id,bt.type_name,bt.type_money,bt.send_type,bt.expire_type,bt.use_start_date,bt.use_end_date,bt.min_goods_amount,bt.mod_type,bt.prescription_type,bt.is_all,bt.dealer_id,pg.id');
       $this->db->from('ecs_bonus_type bt');
       $this->db->join('ecs_point_goods pg','bt.type_id=pg.pid','left');
        if($type == 0){
            $this->db->where("bt.type_id",$content);
        }else{
            $this->db->like("bt.type_name",$content);
        }
        $this->db->limit(100);
        $ref = $this->db->get();
        return $ref -> result_array();
    }
    /*---------------------------------------------------------------------------------------*/
    /*--------------------------------代金券编辑----------------------------------------------*/
    /*---------------------------------------------------------------------------------------*/
    /**
     * 查询商品表代金券（ecs_point_goods）信息
     * return 查询结果数量
     */
    function cash_goods($goods_id,$id='')
    {
        $rm = $this->select_bonus(0,$goods_id);
        $res[] = $rm[0];
        $res[] = $this->seeGoods($id);
        return $res;
    }
    /**
     * 查询商品表信息（编辑实体商品用）
     * $goods_id    传入商品ID
     * return 查询结果数组
     */
    function seeGoods($id)
    {
        $this->db->select('title,tid,cost_points,stock_num,is_sale,sort,is_hot,picture,describe');
        $this->db->from('ecs_point_goods');
        $this->db->where('id',$id);
        $res = $this->db->get()->row_array();
        return $res;
    }
    /**
     * 更新商品信息(ecs_point_goods)（编辑实体商品用）
     * $goods_id   传入修改商品ID
     * $message    传入修改的字段
     * return 修改结果
     */
    public function update_cash($id,$message)
    {   
        $this->db->where('id', $id);
        $res = $this->db->update('ecs_point_goods', $message);
        return $res;
    }

}