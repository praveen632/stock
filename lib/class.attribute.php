<?php
class Attribute{
	public $db ;
    private $table;
	public  function __construct() {
        $this->db = new Mysql();
        $this->table = CMS_ATTRIBUTE;
        $this->table1 = CMS_USERS;
        $this->table2 = USER_ROLE;
     
    }
   public function getAttribute($select = "*"){

	$results = $this->db->get($this->table, $select);
	if($results){
		return $results;
	}
	return false;
}  
    public function addAttribute($data, $condition = '') {
	  if(!empty($condition)){
          return  $results = $this->db->where($condition)->update($this->table, $data);
                  }else{
            return $results = $this->db->insert($this->table, $data);
          }
}

	public function edit($id){
	 $results = $this->db->where(['attribute_id'=>$id])->get($this->table);
	if($results){
		return $results;
	}
	return false;
	}
	
	public function update($id,$data){ 
		$result = $this->db->where(['attribute_id'=>$id])->update($this->table, $data);
		if($result){
		    return $result;
		}
		return false;
	}

	public function delete($id){
         $result = $this->db->where(['attribute_id'=>$id])->delete($this->table);
         if($result){
            return $result;
           }
            return false;
    }

    public function getTax($select = '*', $start_limit=-1){
        $type = $_SESSION['user_data']['user_type'];
        if($type == 1)
        {
            
        if($start_limit>-1){
         $SQL = "SELECT at.*, us.user_type as type, ur.display_name as display_name
             FROM $this->table at
             INNER JOIN $this->table1 us          
             ON at.user_id=us.id
             LEFT JOIN $this->table2 ur
             ON us.user_type=ur.id
             ORDER BY at.attribute_id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($SQL);
             }else{

	           $results = $this->db->where(['1'=>'1'])->order_by('attribute_id', 'DESC')->get($this->table, $select);	           
	          }
	          if($results){
	                return $results;
	            }
	            return false;
            }else{
                
                if($start_limit>-1){
                   $SQL = "SELECT at.*, us.user_type as type, ur.display_name as display_name
                         FROM $this->table at
                         INNER JOIN $this->table1 us          
                         ON at.user_id=us.id
                         LEFT JOIN $this->table2 ur
                         ON us.user_type=ur.id 
                         WHERE us.user_type = $type OR us.user_type = 1
                         ORDER BY at.attribute_id DESC limit $start_limit,".PAGE_SIZE;
                         $results = $this->db->query($SQL);
                         }else{

                           $results = $this->db->where(['1'=>'1'])->order_by('attribute_id', 'DESC')->get($this->table, $select);              
                          }
                          if($results){
                                return $results;
                            }
                            return false;
            }
    }

    public function getTaxBySearch($search_value, $select = '*',$start_limit=-1){
        $type = $_SESSION['user_data']['user_type'];
        if($type == 1)
        {
        if($start_limit>-1){
         $SQL = "SELECT at.*, us.user_type as type, ur.display_name as display_name
             FROM $this->table at
             INNER JOIN $this->table1 us          
             ON at.user_id=us.id
             INNER JOIN $this->table2 ur
             ON us.user_type=ur.id
             AND at.attribute_name like '%$search_value%'
             ORDER BY at.attribute_id DESC limit $start_limit,".PAGE_SIZE;
             $results = $this->db->query($SQL);
        }
         else
         {
              $results = $this->db->where(['1'=>'1'])->_like(['attribute_name'=>$search_value])->order_by('attribute_id', 'DESC')->get($this->table, $select);  
         }
        if($results)
            return $results;

        return false;
    }
    else{
                
                if($start_limit>-1){
                   $SQL = "SELECT at.*, us.user_type as type, ur.display_name as display_name
                         FROM $this->table at
                         INNER JOIN $this->table1 us          
                         ON at.user_id=us.id
                         LEFT JOIN $this->table2 ur
                         ON us.user_type=ur.id 
                         AND at.attribute_name like '%$search_value%'
                         WHERE us.user_type = $type OR us.user_type = 1
                         ORDER BY at.attribute_id DESC limit $start_limit,".PAGE_SIZE;
                         $results = $this->db->query($SQL);
                         }else{

                           $results = $this->db->where(['1'=>'1'])->order_by('attribute_id', 'DESC')->get($this->table, $select);              
                          }
                          if($results){
                                return $results;
                            }
                            return false;
            }

}

public function getImage($id,$select = "*"){

    $results = $this->db->WHERE(['attribute_id'=>$id])->get($this->table, $select);
    if($results){
        return $results;
    }
    return false;
}  

}
?>

