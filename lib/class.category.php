<?php
class Category{
	public $db ;
    private $table;
	public  function __construct() {
        $this->db = new Mysql();
        $this->table = CMS_CATEGORY;
        $this->table1 = CMS_USERS;
        $this->table2 = USER_ROLE;
     
    }
   public function getCategory($select = "*"){
	$results = $this->db->where(['1'=>'1'])->get($this->table, $select);
	if($results){
		return $results;
	}
	return false;
    }   

     public function addCategory($data, $condition = '') {
	  if(!empty($condition)){
            return $this->db->where($condition)->update($this->table, $data);
                  }else{
             return $this->db->insert($this->table, $data);
          }
				
	}
	
	
	public function getcategories($id){
	 $results = $this->db->where(['cat_id'=>$id])->get($this->table);
	if($results){
		return $results;
	}
	return false;
	}
	
	public function update($id,$data){ 
			 $result = $this->db->where(['cat_id'=>$id])->update($this->table,$data);
		       if($result){
		            return $result;
		        }
		            return false;
	}

	 public function delete($id){
         $result = $this->db->where(['cat_id'=>$id])->delete($this->table);
         if($result){
            return $result;
           }
            return false;
    }

    public function getTax($select = '*', $start_limit=-1){
        if($start_limit>-1){
        	$sql = "SELECT ct.*,us.user_type as type, ur.display_name as display_name
        	FROM $this->table ct
            INNER JOIN $this->table1 us
            ON ct.user_id=us.id
            LEFT JOIN $this->table2 ur
            ON us.user_type=ur.id
            ORDER BY ct.cat_id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($sql);
         }
             else{

	           $results = $this->db->where(['1'=>'1'])->order_by('cat_id', 'DESC')->get($this->table, $select);	           
	          }
	          if($results){
	                return $results;
	            }
	            return false;
    }

    public function getTaxBySearch($search_value, $select = '*',$start_limit=-1){
        if($start_limit>-1){
      $sql = "SELECT ct.*,us.user_type as type, ur.display_name as display_name
            FROM $this->table ct
            INNER JOIN $this->table1 us
            ON ct.user_id=us.id
            INNER JOIN $this->table2 ur
            ON us.user_type=ur.id
            AND ct.category_name like '%$search_value%'
            ORDER BY ct.cat_id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($sql);
         }
         else
         {
              $results = $this->db->where(['1'=>'1'])->_like(['category_name'=>$search_value])->order_by('cat_id', 'DESC')->get($this->table, $select);  
         }
        if($results)
            return $results;

        return false;
    }

      public function getImage($id, $select = "*"){
    $results = $this->db->where(['cat_id'=>$id])->get($this->table, $select);
    if($results){
        return $results;
    }
    return false;
    } 

}

?>