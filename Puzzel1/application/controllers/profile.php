<?php
class profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
	}
	
	function index()
	{
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$data['uname'] = $details[0]->fname . " " . $details[0]->lname;
		$data['uemail'] = $details[0]->email;
		$this->load->view('profile_view', $data);
	}

	function account()
	{
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$data['uname'] = $details[0]->fname . " " . $details[0]->lname;
		$data['score'] = $details[0]->score;
		$data['uemail'] = $details[0]->email;
		$this->load->view('account_view', $data);
	}

	function scoreboard(){
		$data['getuser'] = $this->user_model->Getuser();
		$this->load->view('scoreboard_view', $data);
	}
}
