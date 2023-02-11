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
		// $api = "https://api.quotable.io/random?tags=technology,famous-quotes";
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $api);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// $output = curl_exec($ch);
		// curl_close($ch);
		// $result = json_decode($output, true);

		// $data['quote'] = $result['content'];
		// $data['author'] = $result['author'];




		$this->load->view('pengentry/v_dashboard');
	}
}
