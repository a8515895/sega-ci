<?php
class M_admin extends CI_Model {
    public function login($condition){
        return $this->db->get_where("admin",$condition)->first_row();
    }
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
    public function getListProduct($condition=[],$select="product.*"){
        return $this->db
        ->join("admin t1","t1.id = product.create_by")
        ->join("admin t2","t2.id = product.update_by","left")
        ->join("category","category.id = product.id_category","left")
        ->select($select)
        ->get_where("product",$condition)
        ->result_array();
    }
    public function getDetailProduct($condition=[],$select="product.*",$join = false){
        $query = $this->db;
        if($join){
        $query->join("admin t1","t1.id = product.create_by")
            ->join("admin t2","t2.id = product.update_by","left")
            ->join("category","category.id = product.id_category","left");
        };
        return $query->select($select)
        ->get_where("product",$condition)
        ->first_row();
    }
    public function insert($table,$data){
        return $this->db->insert($table,$data);
    }
    public function update($table,$data,$condition){
        return $this->db->update($table,$data,$condition);
    }
}