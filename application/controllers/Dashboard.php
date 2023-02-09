<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();


		$this->load->model('user/User_model', 'User_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	public function index()
	{

		$this->load->view('pengentry/v_dashboard');
	}
}
