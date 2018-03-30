<?php
class M_default extends CI_Model {
    public function getListCategory($condition=[],$select="category.*",$join = true){
        $query = $this->db;
        if($join){
            $query->join("admin t1","t1.id = category.create_by")
            ->join("admin t2","t2.id = category.update_by","left");
        }
        return $query->select($select)
        ->get_where("category",$condition)
        ->result_array();
    }
    public function getListProduct($condition=[],$select="product.*",$limit=""){
        $query = $this->db
        ->order_by("product.id","desc")
        ->join("admin t1","t1.id = product.create_by")
        ->join("admin t2","t2.id = product.update_by","left")
        ->join("category","category.id = product.id_category","left");
        if($limit != ''){
            $query->limit($limit);
        }
        return $query->select($select)
        ->get_where("product",$condition)
        ->result_array();
    }
}