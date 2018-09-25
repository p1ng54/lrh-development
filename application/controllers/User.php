<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}
 
	public function index(){
		//load session library
		$this->load->library('session');
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('home');
		}
		else{
			$this->load->view('login_page');
		}
	}
 
	public function login(){
		//load session library
		$this->load->library('session');
 
		$email = $_POST['email'];
		$password = $_POST['password'];
 
		$data = $this->users_model->login($email, $password);
		if($data['permission'] == '2'){
			$this->session->set_userdata('user', $data);
			redirect('receptionist'); //this function goes to routs file and sends receptionist as parameter
		}
		elseif($data['permission'] == '1'){
			$this->session->set_userdata('user', $data);
			redirect('doctor');
		}
		else{
			header('location:'.base_url().'user');
			$this->session->set_flashdata('error','Invalid login. User not found');
		} 
	}
 
	public function receptionist(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to receptionist if not logged in
		if($this->session->userdata('user')){
			$this->load->view('receptionist/dashboard');
		}
		else{
			redirect('/');
		}
 
	}
	
	public function doctor(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to receptionist if not logged in
		if($this->session->userdata('user')){
			$this->load->view('doctor/dashboard');
		}
		else{
			redirect('/');
		}
 
	}

	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('user');
	}
	public function registration(){
		$params = file_get_contents('php://input');
        $params = json_decode($params);
        $_POST = (array) $params;
		$data = $this->users_model->register($_POST);
		echo json_encode($data);
        exit;
	}
	public function setAppointment(){
		$params = file_get_contents('php://input');
        $params = json_decode($params);
        $_POST = (array) $params;
		$data = $this->users_model->setAppointment($_POST);
		echo json_encode($data);
        exit;
	}
	public function followUpPatientSearch(){
		$params = file_get_contents('php://input');
        $params = json_decode($params);
        $_POST = (array) $params;	
		$data = $this->users_model->followUpPatientSearch($_POST);
		echo json_encode($data);
        exit;
	}
	public function getAppointments(){
		$params = file_get_contents('php://input');
        $params = json_decode($params);
        $_POST = (array) $params;	
		$data = $this->users_model->getAppointments($_POST);
		echo json_encode($data);
        exit;
	}
	public function deletePatient(){
		$params = file_get_contents('php://input');
        $params = json_decode($params);
        $_POST = (array) $params;	
		$data = $this->users_model->deletePatient($_POST);
		echo json_encode('0'.$data);
        exit;
	}
}