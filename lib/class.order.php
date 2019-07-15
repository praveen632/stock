<?php
class Order{
	public $db ;
    private $table;
	public  function __construct() {
        $this->db = new Mysql();
        $this->table = CMS_PRODUCT;
        $this->table1 = ORDER;
        $this->table2 = ORDERPRODUCT;
        $this->table3 = CMS_USERS;
        $this->table4 = ORDERSTATUS;
    }

      public function getOrder($select = '*', $start_limit=-1){
        if($start_limit>-1){
            $sql = "SELECT od.*,us.name as name
            FROM $this->table1 od
            INNER JOIN $this->table3 us
            ON od.user_id=us.id
            ORDER BY od.id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($sql);
         }else{
            $results = $this->db->where(['1'=>'1'])->order_by('id', 'DESC')->get($this->table1, $select);
        }
          if($results){
                return $results;
            }
            return false;
    }

    public function getOrderBySearch($search_value, $select = '*',$start_limit=-1){
        if($start_limit>-1){
             $results = $this->db->where(['1'=>'1'])->_like(['category_name'=>$search_value])->order_by('cat_id', 'DESC')->_limit($start_limit, PAGE_SIZE)->get($this->table, $select);

         }
         else
         {
              $results = $this->db->where(['1'=>'1'])->_like(['category_name'=>$search_value])->order_by('cat_id', 'DESC')->get($this->table, $select);  
         }
        if($results)
            return $results;

        return false;
    }

    public function orderDetails($id){
       // $sql = "SELECT od.*,us.name as name, odp.*, count(odp.id) as count, pro.product_name as product_name 
       //      FROM $this->table1 od
       //      INNER JOIN $this->table3 us
       //      ON od.user_id=us.id
       //      INNER JOIN $this->table2 odp
       //      ON od.id=odp.order_id
       //      INNER JOIN $this->table pro
       //      ON pro.product_id=odp.product_id
       //      WHERE od.id = $id
       //      ORDER BY od.id DESC limit 0,".PAGE_SIZE;
       //     return $results = $this->db->query($sql);
              
          return $results = $this->db->where(['id'=>$id])->get($this->table1);
          //print_r($results);die; 
    }

    public function orderDetailslist($seller_id){
        $sql = "SELECT odp.*, pro.product_name as product_name 
             FROM $this->table2 odp             
             LEFT JOIN $this->table pro
             ON pro.product_id=odp.product_id
             WHERE odp.order_id = $seller_id
             ORDER BY odp.id DESC limit 0,".PAGE_SIZE;
          return $results = $this->db->query($sql);
       // return $results = $this->db->where(['order_id'=>$seller_id])->get($this->table2);
    }

}