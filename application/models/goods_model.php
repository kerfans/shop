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
    //根据where条件获取数量
    function getCount($where='')
    {
        if($where)
        {
            $where=' where '.$where;
        }
        $sql="select count(id) count from ecs_point_goods ".$where;
        $data=$this->db->query($sql);
        return $data->result();
    }
    //查询积分商品信息
    function select($field,$where='',$order='',$limit='',$other='')
    {
        if($where)
        {
            $where=' where '.$where;
        }
        if($order)
        {
            $order=' order by '.$order;
        }
        if($limit)
        {
            $limit=' limit '.$limit;
        }
        if($other)
        {
            $other=' pg, '.$other;
        }
        $sql="select {$field} from ecs_point_goods {$other} {$where} {$order} {$limit}";
        //dd($sql);
        $data=$this->db->query($sql);
        return $data->result();
    }
    /**
     * 删除商品
     * $goods_id   传入商品ID
     * return 修改结果
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('ecs_point_goods');
        return $res;
    }
}