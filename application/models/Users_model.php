<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}
		
		public function register($params){
			$insert = array(
				'full_name'		=>(isset($params['fullName']))?$params['fullName']:"",
				'relative_name'	=>(isset($params['relativeName']))?$params['relativeName']:"",
				'gender'		=>(isset($params['gender']))?$params['gender']:"",
				'phone'			=>(isset($params['phone']))?$params['phone']:"",
				'weight'		=>(isset($params['weight']))?$params['weight']:"",
				'height'		=>(isset($params['height']))?$params['height']:"",
				'date_of_birth'	=>(isset($params['dob']))?$params['dob']:"",
				'address'		=>(isset($params['address']))?$params['address']:"",
				);
				
			if(isset($params['relativeName']) && isset($params['fullName']) && $params['relativeName'] !=""){
				$get = array(
					'full_name'		=>(isset($params['fullName']))?$params['fullName']:"",
					'relative_name'	=>(isset($params['relativeName']))?$params['relativeName']:""
					);
			}elseif(isset($params['fullName'])){
				$get = array(
					'full_name'		=>$params['fullName']
					);
			}
			try{
				$find = $this->db->get_where('lrh_patients', $get);
				if($find->row_array() == null){
					//$sql = $this->db->set($insert)->get_compiled_insert('lrh_patients');
					// return $sql;
					$sql = $this->db->insert('lrh_patients', $insert);
					return $sql;
				}
				else
					return 1;
				//$sql = $this->db->set($insert)->get_compiled_insert('lrh_patients'); check sql	
			}
			catch(Exception $e){
				return $e->getMessage();
			}
		}
		public function deletePatient($params){
			return $params;
		}
		
		public function followUpPatientSearch($params){
			if(isset($params['phoneNumber']) && isset($params['fullName']) && $params['phoneNumber'] !=""){
				$get = array(
					'full_name'		=>	(isset($params['fullName']))?$params['fullName']:"",
					'phone'	=>	(isset($params['phoneNumber']))?$params['phoneNumber']:""
					);
			}elseif(isset($params['fullName'])){
				$get = array(
					'full_name'		=>	$params['fullName']
					);
			}elseif(isset($params['phoneNumber'])){
				$get = array(
					'phone'		=>	$params['phoneNumber']
					);
			}
			try{
				$find = $this->db->like($get);
				$find = $this->db->get('lrh_patients');
				if($find->row_array() == null){
					return 1;
				}
				else
					return $find->result_array;
				//$sql = $this->db->set($insert)->get_compiled_insert('lrh_patients'); check sql	
			}
			catch(Exception $e){
				return $e->getMessage();
			}
		}

		public function getAppointments($params){
			$date = explode('T',$params['date'])[0];
			$where = array(
				'appointment_date' => $date
			);
			$select = 'lrh_patients.id, lrh_patients.full_name, lrh_patients.relative_name,lrh_patients.gender,lrh_appointment.appointment_date,lrh_appointment.appointment_time';
			$joinTable = 'lrh_appointment';
			$joinCondition = 'lrh_appointment.patient_id = lrh_patients.id';
			try{
				$this->db->select($select);
				$this->db->from('lrh_patients');
				$this->db->join($joinTable,$joinCondition);
				$this->db->where($where);
				$this->db->order_by("appointment_time", "asc");
				$find = $this->db->get();
				return $find->result();
				if($find->row_array() == null){
					return 1;
				}
				else
					return $find->result_array;
				//$sql = $this->db->set($insert)->get_compiled_insert('lrh_patients'); check sql	
			}
			catch(Exception $e){
				return $e->getMessage();
			}
		}
 
	}
?>