<?php
/**
 * 广告model
 */
class Ad_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //添加
    public function insert($data)
    {
        $this->db->insert('ecs_point_shop_ad', $data);
        return $this->db->insert_id();
    }
    //查询
    public function select($field,$where='',$order='',$limit='')
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
        $sql="select {$field} from ecs_point_shop_ad {$where} {$order} {$limit}";
        $data=$this->db->query($sql);
        return $data->result();
    }
    //更改根据ID
    public function update($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('ecs_point_shop_ad', $data);
        return $this->db->affected_rows();
    }
    //删除
    public function del($id)
    {
        $this->db->delete('ecs_point_shop_ad', array('id'=>$id));
    }
}