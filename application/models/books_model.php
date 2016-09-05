<?php
header('Content-type:text/html;charset=UTF-8');
class Books_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_books($num,$offset){
              // $this->db->select('type_id');
        $query=$this->db->get('ecs_bonus_type',$num,$offset);
        return $query;
    }
}
?>