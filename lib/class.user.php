<?php
	class User{
			//echo "hi";
			//$table = CMS_PRODUCT;
    public $db ;
        public  function __construct() {
        $this->db = new Mysql();
		$this->table = CMS_USERS;
		$this->table1 = USER_ROLE;
		$this->table2 = STATUS;
						
    }

	public function login($pass, $username){
		$this->db->where(array('username'=>$username,'password'=>md5($pass), 'status'=>'1'));
        $userData = $this->db->get(CMS_USERS);
    if ($userData)   
    {				  
        return $userData;  
    }  
    else  
    {  
        return FALSE;  
    }   
	}

	public function signup($username, $data){
		$result = $this->db->where(['username'=>$username])->get(CMS_USERS);
		if($result){
          return false;
		}else{
          $result = $this->db->insert($this->table, $data);
          	$userData = $this->db->where(['username'=>$username])->get(CMS_USERS);
           return $userData;
		}             
      
	}

	
			
	public function update($id,$data){ 
	 $result = $this->db->where(['id'=>$id])->update($this->table,$data);
	        $results = $this->db->where(['id'=>$id])->get(CMS_USERS);
            $email = $results[0]['email'];
            $status = $results[0]['status'];
            $results_res = $this->db->where(['id'=>$status])->get(STATUS);
            $status_result = $results_res[0]['display_name'];
            if($email){
            	$mail = new PHPMailer(true); 
				$mail->IsSMTP();
                $subject = "Thank you for subscribed services";
				$message = '<html><body>';
				$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
				$message .= "Your account has been ".$status_result." ";
				//$message .= "<tr style='background: #eee;'><td><strong>User Name:</strong> </td><td>" .$username. "</td></tr>";
				//$message .= "<tr><td><strong>Password:</strong> </td><td>" .$str. "</td></tr>";
				//$message .= "<tr><td><strong>URL:</strong> </td><td>".AUTOPASS.'?key='.$user."</td></tr>";
				$message .= "</table>";
				$message .= "</body></html>";
				try {
					$mail->SMTPAuth   = true;
					$mail->SMTPSecure  = 'ssl'; 
					$mail->Host       = "smtp.gmail.com";           
					$mail->Port       = "465";   
					$mail->SMTPDebug = 1;                
					$mail->Username   = "unnatitechsolution@gmail.com";  
					$mail->Password   = "unnatitech@322411!2";
					$mail->SetFrom("unnatitechsolution@gmail.com", "Approved");
					$mail->AddAddress($email, "dshahi");
					$mail->Subject = "Approved" ;
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
					$mail->MsgHTML($message);
					$mail->Send();
					return true;
					 
				} catch (phpmailerException $e) {
				

				return false;
				} catch (Exception $e) {
				return false;        
				}
			}else{
				return false;
			}
	}

	public function getUsers($id){
	$results = $this->db->where(['id'=>$id])->get($this->table);
	if($results){
		return $results;
	}
	return false;
}

public function getUser($select = "*"){
	$results = $this->db->get($this->table, $select);
	if($results){
		return $results;
	}
	return false;
}

public function veryfieduser($users){
	$SQL = "UPDATE $this->table SET email_verify = '1' WHERE username = '$users' ";
     $this->db->querys($SQL);
}

public function addUser($data, $condition = '') {
	if(!empty($condition)){
            return $this->db->where($condition)->update($this->table, $data);
          }else{
            $data = $this->db->insert($this->table, $data);
            $id = $this->db->insert_id($data);
            $result = $this->db->where(['id'=>$id])->get($this->table);
            $username = $result[0]['username'];
            $user = base64_encode($username);
            $email = $result[0]['email'];
				$validChars = array('0','1','2' /*...*/,'?','-','_','a','b','c' /*...*/);
				$validCharsCount = count($validChars);

				$str = '';
				for ($i=0; $i<5; $i++) {
				    $str .= $validChars[rand(0,$validCharsCount - 1)];
				}
			  $pass =	md5($str);
			  $SQL = "UPDATE $this->table SET password = '$pass' WHERE id = '$id' ";
              $this->db->querys($SQL);		 


            if($email){
            	$mail = new PHPMailer(true); 
				$mail->IsSMTP();
                $subject    = "Thank you for subscribed services";
				$message = '<html><body>';
				$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
				$message .= "<tr style='background: #eee;'><td><strong>User Name:</strong> </td><td>" .$username. "</td></tr>";
				$message .= "<tr><td><strong>Password:</strong> </td><td>" .$str. "</td></tr>";
				$message .= "<tr><td><strong>URL:</strong> </td><td>".AUTOPASS.'?key='.$user."</td></tr>";
				$message .= "</table>";
				$message .= "</body></html>";
				try {
					$mail->SMTPAuth   = true;
					$mail->SMTPSecure  = 'ssl';
					//$link = "<a href='".AUTOPASS.'?key='.$pass."'>click here</a> reset password"; 
					$mail->Host       = "smtp.gmail.com";           
					$mail->Port       = "465";   
					$mail->SMTPDebug = 1;                
					$mail->Username   = "unnatitechsolution@gmail.com";  
					$mail->Password   = "unnatitech@322411!2";
					$mail->SetFrom("unnatitechsolution@gmail.com", "Reset Password");
					$mail->AddAddress($email, "dshahi");
					$mail->Subject = "Reset Password" ;
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
					$mail->MsgHTML($message);
					$mail->Send();
					return true;
					 
				} catch (phpmailerException $e) {
				

				return false;
				} catch (Exception $e) {
				return false;        
				}
			}else{
				return false;
			}
          }
				
	}

	public function getusername(){
		$results = $this->db->get($this->table1);
		return $results;
	}

	public function getstatus(){
		$results = $this->db->get($this->table2);
		return $results;
	}	
	public function getuser_type($ids){
		$results = $this->db->where(['id'=>$ids])->get($this->table1);
		return $results;
	}

	public function getTax($select = '*', $start_limit=-1){
        if($start_limit>-1){
           $results = $this->db->where(['1'=>'1'])->order_by('id', 'DESC')->_limit($start_limit, PAGE_SIZE)->get($this->table, $select);
         }
         else
         {
             $results = $this->db->where(['1'=>'1'])->order_by('id', 'DESC')->get($this->table, $select);
         }
        if($results)
            return $results;

        return false;
    }

    public function getTaxBySearch($search_value, $select = '*',$start_limit=-1){
        if($start_limit>-1){
             $results = $this->db->where(['1'=>'1'])->_like(['name'=>$search_value])->order_by('id', 'DESC')->_limit($start_limit, PAGE_SIZE)->get($this->table, $select);
         }
         else
         {
              $results = $this->db->where(['1'=>'1'])->_like(['name'=>$search_value])->order_by('id', 'DESC')->get($this->table, $select);  
         }
        if($results)
            return $results;

        return false;
    }


}
?>
