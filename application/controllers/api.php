<?php

class Api extends CI_Controller{
	
	function index(){
		var_dump('hello');
	}
	
	function getJSONbyUser(){
	//http://localhost:8888/CENFOTEC/PW1-Hood/index.php/Api/getJSONbyUser/username/jherrera/limit/1
		$array = $this->uri->uri_to_assoc();
		
		$this->load->model('api_model');
		$hoods = $this->api_model->getHoodsbyUser($array);
		$user = $this->api_model->getUserData($array);
		
		//$data['hoods'] = json_encode($hoods->result());
		$data['user'] = json_encode($user->result());
		$data['hoods'] = json_encode($hoods->result());
		
		$data = json_encode(array('user'=>$user->result(),'hoods'=>$hoods->result()));
		$this->output->set_content_type('application/json')->set_output($data);
		//echo $data;
	}
	
	function getJSONallHoods(){
		//http://localhost:8888/CENFOTEC/PW1-Hood/index.php/Api/getJSONallHoods/limit/10
		$array = $this->uri->uri_to_assoc();
		
		//var_dump($array); die();
		$this->load->model('api_model');
		$hoods = $this->api_model->getHoods($array);
		$data = json_encode($hoods->result());
		$this->output->set_content_type('application/json')->set_output($data);
		
	}

	function getXMLbyUser(){

		$array = $this->uri->uri_to_assoc();
		
		$this->load->model('api_model');
		$hoods = $this->api_model->getHoodsbyUser($array);
		$user = $this->api_model->getUserData($array);
		
		$data['hoods'] = $hoods->result_array();
		$data['user'] = $user->result_array();
		$data = array('user'=>$user->result_array(),'hoods'=>$hoods->result_array());


		foreach ($data as $i => $row) {
            $username= $row[0]['username'];
            $name= $row[0]['name'];
            $job_position= $row[0]['job_position'];
            $mail= $row[0]['mail'];
            $url= $row[0]['url']; 
			/*$hood= $row[1]['text']; 
            var_dump($hood); die();
			$date= $data['hoods']['date']; */

			echo "<?xml version='1.0' encoding='UTF-8'?> 
			<rss version='2.0'>
			<channel>
			<title>All Hoods</title>
			<link></link>
			<description>Hood</description>
			<language>en-us</language>"; 
		
			echo "<item> 
			<username>$username</username>
			<name>$name</name>
			<job_position>$job_position</job_position>
			<mail>$mail</mail>
			<url>$url</url>
			</item>"; 
        }
		echo "</channel></rss>"; 
		print_r($data);
		header("Content-type: text/xml"); 
		
		//$data = json_encode(array('user'=>$user->result(),'hoods'=>$hoods->result()));
		//$this->output->set_content_type('application/json')->set_output($data);
	}

	/*
	function getXMLallHoods(){
		$array = $this->uri->uri_to_assoc();

		//var_dump($array); die();
		$this->load->model('api_model');
		$hoods = $this->api_model->getHoods($array);
		$data = $hoods->result_array();
		//print_r($data);  die();
		header("Content-type: text/xml"); 

		echo "<?xml version='1.0' encoding='UTF-8'?> 
		<rss version='2.0'>
		<channel>
		<title>All Hoods</title>
		<link></link>
		<description>Hood</description>
		<language>en-us</language>"; 

		foreach ($data as $i => $row) {
            $username=$row['username'];
            $name=$row['name'];
            $job_position=$row['job_position'];
            $mail=$row['mail'];
            $url=$row['url']; 
			$hood=$row['hood']; 
			$date=$row['date']; 

			echo "<item> 
			<username>$username</username>
			<name>$name</name>
			<job_position>$job_position</job_position>
			<mail>$mail</mail>
			<url>$url</url>
			<hood>$hood</hood>
			<date>$date</date>
			</item>"; 
        }
		echo "</channel></rss>"; 
	

		//$this->output->set_content_type('application/xml')->set_output($data);
	}*/

}
?>
