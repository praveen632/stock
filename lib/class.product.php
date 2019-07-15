<?php
class Product{
	public $db ;
    private $table;
	public  function __construct() {
        $this->db = new Mysql();
        $this->table = CMS_PRODUCT;
        $this->table1 = CMS_ATTRIBUTE;
        $this->table2 = CMS_PRODUCTATTRIBUTE;
        $this->table3 = CMS_USERS;
        $this->table4 = CMS_CATEGORY;
        $this->table5 = STATUS;
  
    }
     
      public function getProduct($select = "*"){
	$results = $this->db->get($this->table, $select);
	if($results){
		return $results;
	}
	return false;
}   


   public function addProduct($data, $ids) {    
             $data = $this->db->insert($this->table, $data);
             //print_r($data);die;
             $id_product = $this->db->insert_id($data);
             $datas['attribute_id'] = $ids;
             $datas['product_id'] = $id_product;
             $result =  $this->db->insert($this->table2, $datas);
             return $result;
          }
				
	

	public function edit($id){

	 //$results = $this->db->where(['product_id'=>$id])->get($this->table);
       $SQL = "SELECT pd.*, us.name as user_name, us.id as id, us.user_type as user_type, gt.display_name as admin_statu, at.attribute_name as attribute_name 
             FROM $this->table pd
             INNER JOIN $this->table3 us          
             ON pd.seller_id=us.id                       
             LEFT JOIN $this->table5 gt
             ON pd.admin_status=gt.id
             LEFT JOIN $this->table1 at
             ON us.id=at.user_id
             WHERE pd.product_id = $id";          
             $results = $this->db->query($SQL);
	if($results){
		return $results;
	}
	return false;
	}

	public function update($id,$data,$attribute_id){ 
		$this->db->where(['product_id'=>$id])->update($this->table, $data);
        // $result = $this->db->where(['attribue_id'=>$id])->update($this->table2, $attribute_id);
       $SQL = "UPDATE $this->table2 SET attribute_id = '$attribute_id' WHERE product_id = $id";
         $result = $this->db->query($SQL);
   
		if($result){
		    return $result;
		}
		return false;
	}
	public function delete($id){
         $this->db->where(['product_id'=>$id])->delete($this->table);
         $result = $this->db->where(['product_id'=>$id])->delete($this->table2);
         if($result){
            return $result;
           }
            return false;
    }

    public function saveproductattribute($data, $id){
    	$id = $this->db->insert_id($data);  
    }


    public function getTax($select = '*', $start_limit=-1){        
        $type = $_SESSION['user_data']['user_type'];
        if($type == 1){
            if($start_limit>-1){
                $SQL = "SELECT pd.*, us.name as user_name, ct.category_name as categary_name
                     FROM $this->table pd
                     INNER JOIN $this->table3 us          
                     ON pd.seller_id=us.id
                     INNER JOIN $this->table4 ct
                     ON pd.category_id=ct.cat_id
                     ORDER BY pd.product_id DESC limit $start_limit,".PAGE_SIZE;
                     $results = $this->db->query($SQL);
                     }else{
                       $results = $this->db->where(['1'=>'1'])->order_by('product_id', 'DESC')->get($this->table, $select); 
                      }
                      if($results){
                            return $results;
                        }
                        return false;
                }else{
                  if($start_limit>-1){
                      $SQL = "SELECT pd.*, us.name as user_name, ct.category_name as categary_name
                             FROM $this->table pd
                             INNER JOIN $this->table3 us          
                             ON pd.seller_id=us.id
                             INNER JOIN $this->table4 ct
                             ON pd.category_id=ct.cat_id
                             ORDER BY pd.product_id DESC limit $start_limit,".PAGE_SIZE;
                             $results = $this->db->query($SQL);
                             }else{
                               $results = $this->db->where(['1'=>'1'])->order_by('product_id', 'DESC')->get($this->table, $select); 
                              }
                              if($results){
                                    return $results;
                                }
                                return false;
        }
        
    }

    public function getTaxBySearch($search_value, $select = '*',$start_limit=-1){
        $type = $_SESSION['user_data']['user_type'];
        if($type == '1'){
           if($start_limit>-1){
            $SQL = "SELECT pd.*, us.name as user_name, ct.category_name as categary_name
             FROM $this->table pd
             INNER JOIN $this->table3 us          
             ON pd.seller_id=us.id
             INNER JOIN $this->table4 ct
             ON pd.category_id=ct.cat_id 
             AND pd.product_name like '%$search_value%'
             ORDER BY pd.product_id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($SQL);
             
         }
         else
         {
              $results = $this->db->where(['1'=>'1'])->_like(['product_name'=>$search_value])->order_by('product_id', 'DESC')->get($this->table, $select);  
         }
           if($results)
            return $results;

           return false;
        }else{
            if($start_limit>-1){
          $SQL = "SELECT pd.*, us.name as user_name, ct.category_name as categary_name
             FROM $this->table pd
             INNER JOIN $this->table3 us          
             ON pd.seller_id=us.id
             INNER JOIN $this->table4 ct
             ON pd.category_id=ct.cat_id 
             AND pd.product_name like '%$search_value%'
             WHERE us.user_type = $type          
             ORDER BY pd.product_id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($SQL);
             //$results = $this->db->where(['1'=>'1'])->_like(['name'=>$search_value])->order_by('id', 'DESC')->_limit($start_limit, PAGE_SIZE)->get($this->table, $select);
         }
         else
         {
              $results = $this->db->where(['1'=>'1'])->_like(['product_name'=>$search_value])->order_by('product_id', 'DESC')->get($this->table, $select);  
         }
        if($results)
            return $results;

        return false;
        }
       
    }

    public function getcategory($select = "*"){
        $result = $this->db->get($this->table4, $select);
        if($result){
            return $result;
        }
            return false;
    }

    public function getattribute($id, $select = "*"){
        $result = $this->db->where(['cat_att_id'=>$id])->get($this->table1, $select);
        if($result){
            return $result;
        }
            return false;
    }

    public function getstatus($select = "*"){

        $result = $this->db->get($this->table5, $select);
        if($result){
            return $result;
        }
            return false;
    }

    public function getProductimage($id, $select = "*"){
         $results = $this->db->where(['product_id' =>$id])->get($this->table, $select);
            if($results){
                return $results;
            }
            return false;
            }

}
?>
