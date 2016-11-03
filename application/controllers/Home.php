<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * superadmin-1
 * chief-townplanner-2
 * district-townplanner-3
 * localbody-officers-4
 * local users BI-5
 * AE-7
 * AEE-8
 * Architect Login-6
 */
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function index()
	{
		$this->load->view('site/index');
	}
	public function login_action()
    {
        $result=$this->home_model->login($this->input->post('username'),$this->input->post('password'));

        if($result->num_rows()!==0)
        {
            $this->session->set_userdata('user',$result->row());
            redirect('user/view');
        }
        else
        {
            $this->session->set_flashdata('login_error','Invalid Login data');
            redirect('home');
        }
    }
}
