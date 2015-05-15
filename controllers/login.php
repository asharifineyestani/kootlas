<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('login_model');
   $this->load->library('session');


   
 } //End function _consruct---------------------------------------------------------------------------------

 function signin($slug=NULL)
 {

	//------
	$data['type'] = 'guest';
	//------
	
	
	$this->load->helper(array('form'));
	$this->load->view('templates/header');
	$this->load->view('pages/signin');
   echo urldecode($slug);
   $this->load->view('templates/footer',$data);
 } // End Function signin---------------------------------------------------------------------------------

 	 function signup() //ثبت نام کاربران
 {

 $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        //$this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[12]|trim');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[4]|md5');
        //$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_isEmailExist');
        $this->load->view('templates/header');

		
		    if ($this->form_validation->run() === FALSE)
    {
           // $this->load->view('register_form');
		    $this->load->view('pages/signup');
 
    }
	

		
 else
        {
            //$this->load->view('register_done');
			$this->login_model->signup();
			$data['signup']='ثبت نام با موفقیت انجام شد، لطفا وارد شوید';
			$this->load->view('pages/signup');
			  
        }
        $this->load->view('templates/footer');
 }// End Function SignUp---------------------------------------------------------------------------------
 
         public function chk_usr()
	{             
		if(isset($_POST))
                {
                    $this->load->model('login_model');
                    $usr_name = $_POST['usr_name'];
                    $this->login_model->usrchk($usr_name ); 
                }
	}// End Function username_availability--------------------------------------------------------------
	
	

  function verifylogin()
 {
	 
	 //*******************remember me 2
	 
	 $rememberme = $this->input->post('rememberme');

if( (!isset($rememberme)) || ($rememberme != "rememberme") ) {
    $this->session->sess_expiration = 10800; // 3 hours
    $this->session->sess_expire_on_close = TRUE;
    $this->session->sess_update(); //Force an update to the session data
} 
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
	   
    //Field validation failed.  User redirected to login page

	$this->load->view('templates/header');
    $this->load->view('pages/signin');
    $this->load->view('templates/footer');
   }
   else
   {
     //Go to private area

    redirect('../index.php/admin/general', 'refresh');
 
   }

 } //End verifylogin---------------------------------------------------------------------------------

 function check_database($password)
 {
	
	
	 
   //اعتبارسازی
    $type = $this->input->post('type');
    $username = $this->input->post('username');
   //درخواست به دیتابیس جهت لوگین در هاکا کوتلاس
	   if ($type==='user_type') {
			  $result = $this->login_model->login_user($username, $password);
	   }
	   elseif ($type==='tutor_type')  {
			 $result = $this->login_model->login_user($username, $password);
	   }
  
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       	 $sess_array = array(
         //'myid' => $row->ID,
         'username' => $row->user_username,
		 'id' => $row->user_id
       );
	   $sess_array['type']=$type;
	   
	   
       $this->session->set_userdata('logged_in', $sess_array);
	   
     }
	 return TRUE;
   }
	 

   else
   {
     $this->form_validation->set_message('check_database', 'پسورد یا یوزرنیم اشتباه می باشد');
	 return false;
   }
 }//End check_database---------------------------------------------------------------------------------

	 function logout()
 {
   $this->session->unset_userdata('logged_in');
   $this->session->sess_destroy();
   session_destroy();
   redirect('../index.php/login', 'refresh');
 }//End logout------------------------------------------------------------------------------------------

 
  public function chang_password(){
	    $this->load->library('form_validation');
    $this->form_validation->set_rules('old_password', 'old_password', 'trim|required|xss_clean');
    $this->form_validation->set_rules('newpassword', 'New Password', 'required|matches[re_password]');
    $this->form_validation->set_rules('re_password', 'Retype Password', 'required');
    if($this->form_validation->run() == FALSE){
       $this->data['title'] = 'Change Password';
        $sessionData = $this->session->userdata('loggedIn');
        $this->data['id'] = $sessionData['id'];
        $this->data['username'] = $sessionData['username'];
        $this->data['type'] = $sessionData['type'];

        //$this->load->view('templates/header', $this->data);
        $this->load->view('admin/password');
        //$this->load->view('templates/footer');
    }else{
      $query = $this->login_model->checkOldPass(md5($this->input->post('old_password')));
      if($query==1){
        $query = $this->login_model->saveNewPass(md5($this->input->post('newpassword')));
        if($query){
          redirect('../index.php/admin/profile/password?submit=1');
        }else{
          redirect('../index.php/admin/profile/password=2');
        }
	  }else { redirect('../index.php/admin/profile/password?submit=0');}
      }

    }
 



		
} //END CLASS------------------------------------------------------------------------------------------




