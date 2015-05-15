<?php
class login_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
		
    } //End Function _contrust ----------------------------------------------------------------



	public function get_user($slug=NULL,$var1=NULL,$var2=NULL)
		{
			$this->db->select('*');
			$this->db->from('kootlas_city AS c');
			$this->db->join('kootlas_state AS p','c.city_state_id = p.state_id');
			$this->db->join('mb_kootlas AS t','c.city_id =t.kootlas_city_id ');
			if ($slug=='where' & $var1!=NULL && $var2!=NULL)
			$this->db->where($var1,$var2); 
			$query = $this->db->get();
			return $query->result_array();
	
		} //END function get_user ----------------------------------------------------------------
		
public function checkOldPass($old_password)
{
    		$id = $this->input->post('id');
            $this->db->where('user_username', $this->session->userdata('username'));
            $this->db->where('user_id', $id);
    		$this->db->where('user_password', $old_password);
    $query = $this->db->get('kootlas_user');
    if($query->num_rows() > 0)
        return 1;
    else
        return 0;
}



    public function usrchk($usr) {
        $qry = 'SELECT count(*) as cnt from kootlas_user where user_username= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }
	
  //END function usrchk ----------------------------------------------------------------
public function saveNewPass($new_pass)
{
    $data = array(
           'user_password' => $new_pass
        );
	$id = $this->input->post('id');
    $this->db->where('user_username', $this->session->userdata('username'));
	$this->db->where('user_id', $id);

    $this->db->update('kootlas_user', $data);
    return true;
}
//END function saveNewPass ----------------------------------------------------------------



public function signup()
{
$data = array(
   'user_fname' => $this->input->post('fname') ,
   'user_lname' => $this->input->post('lname') ,
   'user_email' => $this->input->post('email'),
   'user_mobile' => $this->input->post('mobile') ,
   'user_level' => $this->input->post('level') ,
   'user_disable' => $this->input->post('disable'),
   'user_username' => $this->input->post('username'),
   'user_password' => $this->input->post('password')
);

$this->db->insert('kootlas_user', $data); 
}
//END function saveNewPass ----------------------------------------------------------------


	 public function login_user($username, $password)
	 {
	   $this -> db -> select('*');
	   $this -> db -> from('kootlas_user');
	   
	   $this -> db -> where('user_username', $username);
	   $this -> db -> where('user_password', MD5($password));
	   $this -> db -> where('user_disable <>', 1);

	   
	   $this -> db -> limit(1);
	
	   $query = $this -> db -> get();
	
		   if($query -> num_rows() == 1)
		   {
			 return $query->result();
		   }
		   else
		   {
			 return false;
		   }
	 } // End Function login_user ----------------------------------------------------------------




} //END class
