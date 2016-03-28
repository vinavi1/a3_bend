<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends MY_model {

	protected $_table = 'users'; 
	protected $primary_key = 'user_id';
	protected $return_type = 'array';

	protected $after_get = array('remove_sensitive_data') ;

	protected function remove_sensitive_data($student) {
		unset($student['password']);
		return $student;
	}
}