<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {
	

	public function index()
	{
				
		$this->is_logged_in();
		$this->load->model("hood_model");
		$userid= $this->session->userdata('id');
		$currusername = $this->session->userdata('username');
		
		/*---------------------- Get Info Logged User ----------------------*/
		$userInfo = $this->hood_model->getInfoUser($userid);

		$data['name'] = $userInfo[0]['name'];
		$data['last_name'] = $userInfo[0]['last_name'];
		$data['job_position'] = $userInfo[0]['job_position'];
		$data['url_img'] = $userInfo[0]['url_img'];
		/*---------------------- END Get Info Logged User ----------------------*/

		/*---------------------- Get Info All Users ----------------------*/
		$hoodsQ = $this->hood_model->getCountHoods($userid);
		$userQ = $this->hood_model->getCountUsers();
		$attachmentsQ = $this->hood_model->getCountAttachmentsbyId($userid);

		$data['infoAllUsers'] = $this->hood_model->getInfoUser();
		$data['numberHoods'] = $hoodsQ[0]['COUNT(*)'];
		$data['numberUsers'] = $userQ[0]["COUNT(*)"];
		$data['numberAttachments'] = $attachmentsQ[0]["COUNT(*)"];
		/*---------------------- Get Info All Users ----------------------*/
		
		$data['currentUser'] = $currusername;

		$data['main_content'] = 'perfil';
		$this->load->view('includes/template', $data);
	}

	public function is_logged_in(){
		  $is_logged_in = $this->session->userdata('is_logged_in');
		  if(!isset($is_logged_in) || $is_logged_in != true)
		  {
		   echo 'You don\'t have permission to access this page. <a href="../index.php/login">Login</a>'; 
		   die();  
		   //$this->load->view('login_form');
		  }  
	}
	
	function show(){
		$array = $this->uri->uri_to_assoc();
		if(array_key_exists('user', $array)){
			$this->load->model("users_model");
			$this->load->model("hood_model");
			
			if($userid = $this->users_model->getIdFromUsername($array['user'])){
				//var_dump($userid); die();
				$currusername = $array['user'];
				
				/*---------------------- Get Info Logged User ----------------------*/
				$userInfo = $this->hood_model->getInfoUser($userid);
				
				$data['name'] = $userInfo[0]['name'];
				$data['last_name'] = $userInfo[0]['last_name'];
				$data['job_position'] = $userInfo[0]['job_position'];
				$data['url_img'] = $userInfo[0]['url_img'];
				/*---------------------- END Get Info Logged User ----------------------*/
		
				/*---------------------- Get Info All Users ----------------------*/
				$hoodsQ = $this->hood_model->getCountHoods($userid);
				$userQ = $this->hood_model->getCountUsers();
				$attachmentsQ = $this->hood_model->getCountAttachmentsbyId($userid);
		
				$data['infoAllUsers'] = $this->hood_model->getInfoUser();
				$data['numberHoods'] = $hoodsQ[0]['COUNT(*)'];
				$data['numberUsers'] = $userQ[0]["COUNT(*)"];
				$data['numberAttachments'] = $attachmentsQ[0]["COUNT(*)"];
				/*---------------------- Get Info All Users ----------------------*/
				
				$data['currentUser'] = $currusername;
				
				$data['main_content'] = 'perfil';
				$this->load->view('includes/template', $data);
			}
			else
				redirect(base_url()."index.php/perfil");
		}
		else
			redirect(base_url()."index.php/perfil");
	}
}
