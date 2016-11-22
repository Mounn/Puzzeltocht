<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('InformatieModel');
		$this->load->helper('url');
		$this->load->library('parser');
		$this->load->library('session');
    }


	public function index()
	{
		$this->load->view('voorpagina');
		$this->load->helper('url');

	}

	public function puzzeltocht(){
		$data['getinformatie'] = $this->InformatieModel->GetInformatie();
		$this->load->view('puzzeltocht', $data);


	}

	public function quiz_game(){
		$this->load->view('quiz_game');
		$this->load->helper('url');

	}

	public function test(){
		$this->load->view('test');
		$this->load->helper('url');

	}

	/*
	public function Info(){
		$id = $this->input->post('id');
		$title = $this->input->post('titel');
		$information = $this->input->post('informatie');
		$picture = $this->input->post('foto');

		if ($this->input->post()){
		$data = $this->InformatieModel->GetInformatie($id,$title,$information,$picture);
	}
	*/

}
