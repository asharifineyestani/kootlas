		<?php
#| -------------------------------------------------------------------------
#| Session
#| -------------------------------------------------------------------------
	$session_data = $this->session->userdata('logged_in');				
	   if($this->session->userdata('logged_in'))
	{
	 $data['type'] = $session_data['type'];
	 $data['id'] = $session_data['id'];
	 $data['username'] = $session_data['username'];
	 }
#| -------------------------------------------------------------------------
#| Public Variable 
#| -------------------------------------------------------------------------
  	//$data['event']=$this->pages_model->get_event('where','event_username',$session_data['username']);
	//$data['event_view']=$this->pages_model->get_event('where','event_username',$this->uri->segment(2));

	
#| -------------------------------------------------------------------------
#| authentication
#| -------------------------------------------------------------------------
	$data['title']='گروه هاکا کوتلا';
	
	
	
	
	
	
   	if ($this->uri->segment(1)=='setting' ||
	$this->uri->segment(1)=='set' ||
	$this->uri->segment(1)=='do_upload_picture'
	)
	{
			if (!isset($session_data['username']) ) 
				{
					show_404(); 
				}
	}


	

		
	
		
		
		?>