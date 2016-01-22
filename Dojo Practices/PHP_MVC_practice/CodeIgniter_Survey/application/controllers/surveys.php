<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveys extends CI_Controller {

		public function __construct() 
	{
		parent::__construct();
	}


	public function index()
	{
		//load the view file 'survey.php'
		$this->load->view('survey');
	}

	public function process_form()
	{
		//set session_flashdata for location	
		$location = $this->input->post('location');
		$this->session->set_userdata('location', $location);

		//set session_flashdata for favorite language
		$fav_lang = $this->input->post('favorite_language');
		$this->session->set_userdata('favorite_language', $fav_lang);			

		//set session_flashdata for comment
		$comment = $this->input->post('comment');
		$this->session->set_userdata('comment', $comment);			

		//set session_flashdata for name
		if(!empty($this->input->post('name'))) {
			$name = $this->input->post('name');
			$this->session->set_userdata('name', $name);
		}

		// echo $this->session->userdata('name');
		redirect('/result');

	}

	public function result()
	{
		
		//setting the counter session data
		if(!$this->session->userdata('counter'))
		{
			$this->session->set_userdata('counter', 1);

		} else {
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter + 1);
		}

		//pushing session data into an array
		$data = array('counter' => $this->session->userdata('counter'),
					  'name' => $this->session->userdata('name'),
					  'location' => $this->session->userdata('location'),
					  'favorite_language' => $this->session->userdata('favorite_language'),
					  'comment' => $this->session->userdata('comment'));

		//passing session data in an array to the view file 'result.php'
		$this->load->view('result', $data);
	}

	public function go_back() {

		//unset session data
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('location');
		$this->session->unset_userdata('favorite_language');
		$this->session->unset_userdata('comment');

		//redirect to the blank survey page
		redirect('/');
	
	}

}
