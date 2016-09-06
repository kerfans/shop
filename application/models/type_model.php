<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_Model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }

	//添加
	public function insert($data)
	{
		$this->db->insert('ecs_point_goods_type', $data);
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
		$sql="select {$field} from ecs_point_goods_type {$where} {$order} {$limit}";
		$data=$this->db->query($sql);
		return $data->result();
	}
	//更改根据ID
	public function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('ecs_point_goods_type', $data);
		return $this->db->affected_rows();
	}
}