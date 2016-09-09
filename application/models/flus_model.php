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
     * 查询流量表(ecs_point_goods_traffic)
     * $message 传入关联数组
     * return 返回上一次添加的ID
     */
    function select_flus($goods_id)
    {
        $this->db->select('id,title,operator,flow,status,atime');
        $this->db->from('ecs_point_goods_traffic');
        $this->db->where("id",$goods_id);
        $ref = $this->db->get();
        return $ref -> row_array();
    }
    /**
     * 查询流量表信息（编辑用）
     * $id 传入关联数组
     * return 返回上一次添加的ID
     */
    function all_flus($goods_id,$id='')
    {
        $res[] = $this->select_flus($goods_id);
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
        //pp($message);
        $zb = array(
            'title'=>$message['title'],
            'flow'=> $message['flow'],
            'operator'=>$message['operator']
        );
        $sp = array(
            'title'=>$message['title'],
            'cost_points'=>$message['cost_points'],
            'stock_num' =>$message['stock_num'],
            'sort'=>$message['sort'],
            'is_sale'=>$message['is_sale'],
            'is_hot'=>$message['is_hot'],
            'describe'=>$message['describe'],
            'picture'=>$message['picture']
        );
        $this->db->where('id', $id);
        $this->db->update('ecs_point_goods_traffic', $zb);
        $res = $this->db->update('ecs_point_goods', $sp);
        return $res;
    }



}