<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{	
		if(!$this->session->userdata('gold')) {
			$this->session->set_userdata('gold', 0);		
		}
		if(!$this->session->userdata('activity_log')) {
			$this->session->set_userdata('activity_log', []);
		}
		$userdata = array('current_gold' => $this->session->userdata('gold'),
						  'activity_log' => $this->session->userdata('activity_log'));

		$this->load->view('index', $userdata);
	}

	public function process_money() {
		if($this->input->post('building') == 'farm') {
			$update_gold = rand(5,10);
			$building = 'farm';
		} else if ($this->input->post('building') == 'cave') {
			$update_gold = rand(10,20);
			$building = 'cave';
		} else if ($this->input->post('building') == 'house') {
			$update_gold = rand(2,5);
			$building = 'house';
		} else if ($this->input->post('building') == 'casino') {
			$update_gold = rand(-50,50);
			$building = 'casino';
		}

		if($update_gold < 0) {
			$result = 'loss';
		}
		else {
			$result = 'win';
		}
		$log = array('building' => $building,
					 'result' => $result,
					 'update_gold' => $update_gold, 
					 'date' => date('F jS Y h:i:s A'));
		$activity_log = $this->session->userdata('activity_log');
		array_push($activity_log, $log);
		$current_gold = $this->session->userdata('gold');
		
		$this->session->set_userdata('activity_log', $activity_log);
		$this->session->set_userdata('gold', $current_gold + $update_gold);
		
		redirect('/index');
	}
}

//end of main controller