<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		//load 'date' helper to utilize date-related functions
		$this->load->helper('date'); 


		//set $date and $time variable
		$datestr = "%M %d, %Y";
		$timestr = "%h:%i %A";
		$timef = time();

		$date = mdate($datestr, $timef);
		$time = mdate($timestr, $timef);

		//sending $date and $time variables to the view file 'time_display.php'
		$this->load->view('time_display', array('date' => $date, 'time' => $time));
	}

	public function __construct() 
	{
		parent::__construct();
		//$this->output->enable_profiler();
	}


}
