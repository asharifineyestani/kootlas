<?php 

class Pages extends CI_Controller {
  public function __construct()
    {
        parent::__construct();

		 $this->load->model('pages_model');
		 $this->load->helper("url");
		 $this->load->helper(array('form', 'url')); 
		 $this->load->library('session');
   
    } // END function __construct
	
		/*

			public function user_profile ($slug)
			{
				
				include('include/variable.php');
				

				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/user',$data);
				$this->load->view('aside/user_aside.php',$data);
				$this->load->view('templates/footer.php',$data);
				
				
				
		
			} // END function user_profile */
			
		
		public function view ($page='index')
			{
				
				include('include/variable.php');
				
				if (!file_exists('application/views/pages/'.$page.'.php'))
				{
				show_404();
				}
				
				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/'.$page,$data);
				$this->load->view('templates/footer.php',$data);

				
		
			} // END function view
			
			
			public function admin ($page='index')
			{
				
				include('include/variable.php');
				//include('include/seo.php');
				
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('submitt', 'submitt');
				
				if (!file_exists('application/views/admin/'.$page.'.php'))
				{
				show_404();
				}
				

					if ($this->form_validation->run() === FALSE)
				{
				
				$this->load->view('templates/header.php',$data);
				$this->load->view('admin/'.$page,$data);
				$this->load->view('aside/admin.php');
				$this->load->view('templates/footer.php',$data);
				}
		else
		{
			$this->pages_model->set_tutor($page,NULL,$session_data['username']);
			redirect('../index.php/setting/profile/'.$page,'refresh');
			//$data['sucess_msg']='پیام شما با موفقیت ارسال شد';
			$this->load->view('templates/header.php',$data);
			$this->load->view('admin/'.$page,$data);
			$this->load->view('aside/login.php');
			$this->load->view('templates/footer.php',$data);
			
		}
				
		
			} // END function admin
			
			

	/*
	public function event_search($slug='index')
	{	
	
	$data['event_by_search']=$this->pages_model->get_event();

	
			$this->load->helper('form');
		$this->load->library('form_validation');
	 
		include("include/variable.php");
	 
		$this->form_validation->set_rules('userid', 'userid', 'required');

	
		if ($this->form_validation->run() === FALSE)
		{
		$this->load->view('templates/header', $data);
		$this->load->view('pages/search', $data);
		$this->load->view('aside/search_aside', $data);
		$this->load->view('templates/footer');
		}
		
		else
		{
		$this->do_search();
		}
		
		
	}
	

		public function do_search(){
			
		include("include/variable.php");	
		$slug='index';

		
		$search_term = array(
			'field' => $this->input->post('field'),
			'city' => $this->input->post('city'),
			'province' => $this->input->post('state'));
			
		
		$data['event_by_search'] = $this->pages_model->get_event_by_search($search_term);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/search', $data);
		$this->load->view('aside/search_aside', $data);
		$this->load->view('templates/footer');
		
		}*/
			
	/*
		public function event_add ($slug=NULL)
			{
				
				include('include/variable.php');
				

				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/event_add.php',$data);
				//$this->load->view('aside/event_aside.php',$data);
				$this->load->view('templates/footer.php',$data);
				
				
				
		
			} // END function view */


	public function event_view ($slug=NULL)
			{
				include('include/variable.php');

				
				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/event_view.php',$data);
				$this->load->view('aside/event_aside.php',$data);
				$this->load->view('templates/footer.php',$data);

				
				
		
			} // END function view

	
	public function event_add()
{
			include('include/variable.php');
				

				
	
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	 
	 
		$this->form_validation->set_rules('title', 'title', 'required');
		
		
	 
		if ($this->form_validation->run() === FALSE)
		{
				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/event_add.php',$data);
				//$this->load->view('aside/event_aside.php',$data);
				$this->load->view('templates/footer.php',$data);
	 
		}
		else
		{
			$this->pages_model->add_event();
			
			$data['sucess_msg']='رویداد با موفقیت ثبت شد';
		$this->load->view('templates/header.php',$data);
				
				$this->load->view('pages/event_add.php',$data);
				//$this->load->view('aside/event_aside.php',$data);
				$this->load->view('templates/footer.php',$data);
		}
		
		
		
		
}//End Function


} // END CLASS



?>
