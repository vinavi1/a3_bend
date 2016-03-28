<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Home extends REST_Controller {
	function __construct() {
		parent::__construct();
	}

	function login_get(){
		

		$user_id = $this->get('user_id');
		$password = $this->get('password');
		
        $this->load->model('Model_users');

		$user = $this->Model_users->get_by(array('user_id'=> $user_id));

		if (!isset($user['user_id'])) {
			$this->response(array('success'=> 0 ,'message'=>'User_ID doesnot exist'));
		}
		else{
			$user = $this->Model_users->get_by(array('user_id'=> $user_id,'password'=>$password));
			if (isset($user['user_id'])) { 
				$this->load->driver('session');
				$this->session->set_userdata($user);
				$rval = $this->session->userdata('user_id');
				$this->response($rval);
				//$this->response(array('success'=> 1,'message'=>$user));
			}
			else { 
				$this->response(array('success'=> 0 ,'message'=>'password doesnot match'));
			}
			
		}
	}





}