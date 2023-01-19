<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecast extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
	   $this->load->model('M_forecast');
	   $this->load->helper('url');
    }

	public function home()
	{
		$this->load->view('home');
	}

	public function index()
	{
		$data['data_forecast'] = $this->M_forecast->data()->result();
		$this->load->view('data_forecast', $data);
	}

}