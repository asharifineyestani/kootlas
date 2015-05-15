<?php
class pages_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
		
    }

			public function update_event($slug) //-----ویرایش رویداد
{
	

		$this->load->helper('url');
		
	
			$data = array(
			'event_title' => $this->input->post('title'),
			'event_text' => $this->input->post('text'),
			'event_date' => $this->input->post('date'),
			'event_city' => $this->input->post('city'),
			'event_state' => $this->input->post('state'),
			'event_price' => $this->input->post('price'),
			'event_owner' => $this->input->post('owner')
		); 


		$this->db->where('event_id',$slug);
    return $this->db->update('kutlas_event', $data);
	
}//END function update_event___________________________________________________________________

public function add_event() // اضافه کردن رویداد
{
			$data = array(
			'event_title' => $this->input->post('title'),
			'event_text' => $this->input->post('text'),
			'event_date' => $this->input->post('date'),
			'event_city' => $this->input->post('city'),
			'event_state' => $this->input->post('state'),
			'event_price' => $this->input->post('price'),
			'event_owner' => $this->input->post('owner')
		); 

$this->db->insert('kootlas_event', $data); 
}
//END function add_event ----------------------------------------------------------------

public function delet_event($slug) // پاک کردن رویداد
{
	$this->db->where('event_id',$slug);
	
	$this->db->delet('kootlas_event'); 
}
//END function delet_event ----------------------------------------------------------------

	public function get_event($slug=NULL) //انتخاب رویداد
		{

			$this->db->select('*');
			$this->db->from('kootlas_event');
			//-------------------------------
			if(isset($slug))
			$this->db->where('event_id',$slug);
			//------------------------------- 	 
			$query = $this->db->get();
			return $query->result_array();
	
	
		} //END function get_event___________________________________________________________________

public function get_event_by_search($search_term=Null)  //جستجو در رویدادها

		{
		

			   $this->db->select('*');
			   $this->db->from('kootlas_event');
			   $where="event_date LIKE '%".$search_term['date']."%' or
				event_city like '".$search_term['city']."' or
				event_state like '".$search_term['state']."' ";
			   $this->db->where($where);
			   $query = $this->db->get();
			   
				return $query->result_array();


}//END function get_person___________________________________________________________________
		
		
		public function get_user($slug=NULL) //انتخاب کاربر
		{

			$this->db->select('*');
			$this->db->from('kootlas_user');
			//-------------------------------
			if(isset($slug))
			$this->db->where('user_id',$slug);
			//------------------------------- 	 
			$query = $this->db->get();
			return $query->result_array();
	
	
		} //END function get_event___________________________________________________________________

} //END class
