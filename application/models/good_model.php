<?php
/**
 * 实体商品操作模型
 * User: w
 * Date: 2016/9/5
 * Time: 10:31
 */
class Good_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * 查询原商品表（ecs_goods）（ecs_goods_index）中的信息
     * $type 类别（0，根据代金券ID查询，1根据代金券名称查询）
     * $content  查询输入的内容（ID或者名称）
     * return 查询药品记录信息数组
     */
    function all_message($goods_id)
    {
        $rm = $this->select_good(0,$goods_id );
        $res[] = $rm[0];
        $res[] = $this->detail($goods_id);
        $res[] = $this->goods_pics($goods_id);
        return $res;
    }
    /**
     * 查询原商品表（ecs_goods）（ecs_goods_index）中的信息
     * $type 类别（0，根据商品ID查询，1根据商品名称查询）
     * $content  查询输入的内容（ID或者名称）
     * return 查询药品记录信息数组
     */
    function select_good($type,$content)
    {
        $this->db->select('eg.goods_id,eg.goods_sn,eg.goods_name,eg.goods_weight,egi.shop_price,eg.is_real,
        eg.is_integral,eg.is_on_sale,eg.company,eg.guige,eg.common_name,eg.product_unit,eg.ratifier_no,
        eg.prescription_type,eg.is_special,egi.shop_id,egi.market_price,egi.goods_number,egi.dealer_id,pg.id');
        $this->db->from('ecs_goods  eg');
        $this->db->join('ecs_goods_index egi','eg.goods_id = egi.goods_id','left');
        $this->db->join('ecs_point_goods pg','eg.goods_id=pg.pid','left');

        if($type == 0){
            $this->db->where("eg.goods_id",$content);
        }else{
            $this->db->like("eg.goods_name",$content);
        }
        $this->db->limit(100);
        $ref = $this->db->get()->result_array();
        return $ref;
    }
    /**
     * 查询原商品表商品功能描述（goods_instr_attr）（goods_category_instr_attr）信息数量
     * $goods_id     //传入查询商品的ID
     * return 查询出来商品的信息数组
     */
    function detail($goods_id)
    {
        $this->db->select('gc.attr_name,gia.attr_content');
        $this->db->from('goods_instr_attr gia');
        $this->db->join('goods_category_instr_attr gc','gia.cate_id=gc.cate_id');
        $this->db->where('gc.is_image',0);
        $this->db->where('gia.attr_content !=','');
        $this->db->where('gc.attr_id','gia.attr_id',FALSE);
        $this->db->where_in('gia.goods_id',$goods_id);
        $res = $this->db->get()->result_array();
        return $res;
    }
    /**
     * 查询原商品表商品图片（ecs_goods_gallery）信息数量
     * $goods_id    传入商品ID
     * return 查询图片数组（第一个元素为展示图片）
     */
    function goods_pics($goods_id)
    {
         $this->db->select('img_url,thumb_url');
         $this->db->from('ecs_goods_gallery');
         $this->db->where('goods_id',$goods_id);
         $res=$this->db->get()->result_array();     //剩余展示图
         return $res;
    }
    /*--------------------------------------------------------------------------------------------*/
    /*-----------------------------------编辑实体商品相关model-------------------------------------*/
    /*--------------------------------------------------------------------------------------------*/
    /**
     * 查询实体商品信息（编辑实体商品用）
     * $goods_id    传入商品ID
     * return 查询结果数组
     */
    function shi_goods($goods_id,$id='')
    {
        $rm = $this->select_good(0,$goods_id);
        $res[] = $rm[0];
        $res[] = $this->detail($goods_id);
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
         $res['picture'] = array_filter(explode(' ',$res['picture']));
         return $res;
     }
    /**
     * 查询商品表图片（编辑实体商品用）
     * $goods_id    传入商品ID
     * return 查询结果数组(一维）
     */
    function onePic($id)
    {
        $this->db->select('picture');
        $this->db->from('ecs_point_goods');
        $this->db->where('id',$id);
        $res = $this->db->get()->row_array();
        $res = array_filter(explode(' ',$res['picture']));
        return $res;
    }
    /**
     * 更新商品信息(ecs_point_goods)（编辑实体商品用）
     * $goods_id   传入修改商品ID
     * $message    传入修改的字段
     * return 修改结果
     */
    public function update_goods($id,$message)
    {
        $this->db->where('id', $id);
        $res = $this->db->update('ecs_point_goods', $message);
        return $res;
    }
   

}