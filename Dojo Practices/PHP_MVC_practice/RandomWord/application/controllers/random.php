<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Random extends CI_controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		
		if (empty($this->session->userdata('attempt'))) {
			$this->session->set_userdata('attempt', 1);
		} else {
			$current_att = $this->session->userdata('attempt');
			$this->session->set_userdata('attempt', $current_att + 1);
		}

		$attempt = $this->session->userdata('attempt');
		$rand_numb = bin2hex(openssl_random_pseudo_bytes(7));
		$data = array('attempt' => $attempt, 'rand_numb' => $rand_numb);
		
		$this->load->view('random_words', $data);
		
	}

}

?>