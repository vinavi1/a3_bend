<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Complaints extends REST_Controller {
	function __construct() {
		parent::__construct();
	}


	function hostel_get(){
		$variable_name = $this->session->userdata('hostel');
		$this->response($rval);
	}
}