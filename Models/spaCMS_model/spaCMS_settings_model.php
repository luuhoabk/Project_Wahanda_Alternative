<?php

class SpaCMS_Settings_Model {
	function get_type_business() {
		$query = "SELECT * FROM type_business";
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function get_country() {
		$query = "SELECT * FROM country";	
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function get_district() {
		$query = "SELECT * FROM district";	
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function get_user_detail() {
		$user_id = Session::get('user_id');
		$query = "SELECT * FROM user WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function update_user_detail() {
		$user_id = Session::get('user_id');
		$data = array();
		foreach ($_POST as $key => $value) {
			if($key == "url") {
				continue;
			}
			if($key == "user_slide"){
				$data["$key"] = implode(',', $value);
				continue;
			}
			$data["$key"] = $value;
		}
		$sth = $this->db->update('user', $data, "user_id = $user_id");

		if($sth){
			echo json_encode(array(
				'success' 	=> true,
				'messages' 	=> null,
				'data' 		=> array()
			));
		} else {
			echo json_encode(array(
				'success' 	=> false,
				'messages' 	=> null,
				'data' 		=> array()
			));
		}
		
	}


	function get_user_open_hour() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_open_hour FROM user WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo $result[0]['user_open_hour'];
	}

	function update_user_open_hour() {
		$user_id = Session::get('user_id');
		$user_open_hour_from = $_POST['user_open_hour_from'];
		$user_open_hour_to = $_POST['user_open_hour_to'];

		$aData = '{';
		for ($i=2; $i < 9; $i++) { 
			$is_open = 0;
			$is_from = 8;
			$is_to	 = 22;
			foreach ($user_open_hour_from as $key => $hour_from) {
				if($i == $key) {
					$is_open = 1;
					$is_from = $hour_from;
					$is_to	 = $user_open_hour_to[$key];
				} 
			}
			$aData .= '"'.$i.'":['.$is_open.','.$is_from.','.$is_to.'],';
		}
		$aData = rtrim($aData, ',');
		$aData .= '}';

		$data = array(
				'user_open_hour' => $aData,
			);

		$sth = $this->db->update('user', $data, "user_id = $user_id");

		if($sth){
			echo json_encode(array(
				'success' 	=> true,
				'messages' 	=> null,
				'data' 		=> array()
			));
		} else {
			echo json_encode(array(
				'success' 	=> false,
				'messages' 	=> null,
				'data' 		=> array()
			));
		}
		
	}

	function get_user_is_use_voucher() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_is_use_voucher FROM user WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo $result[0]['user_is_use_voucher'];
	}

	function update_user_is_use_voucher() {
		$user_id = Session::get('user_id');
		$data = array('user_is_use_voucher'=>0);
		if(isset($_POST['user_is_use_voucher'])) {
			$data['user_is_use_voucher'] = 1;
		}
		$sth = $this->db->update('user', $data, "user_id = $user_id");

		if($sth){
			echo json_encode(array(
				'success' 	=> true,
				'messages' 	=> null,
				'data' 		=> array()
			));
		} else {
			echo json_encode(array(
				'success' 	=> false,
				'messages' 	=> null,
				'data' 		=> array()
			));
		}
	}

	function get_user_company() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_company_name, user_company_delegate, user_company_tax_code,"
		."user_company_address, user_company_country_id, "
		."user_contact_name, user_contact_email, user_contact_phone, user_contact_role "
		."FROM user "
		."WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function update_user_company() {
		$user_id = Session::get('user_id');
		$data = array();
		foreach ($_GET as $key => $value) {
			if($key == "url") {
				continue;
			}
			$data["$key"] = $value;
		}
 		// print_r($data); die;
		$sth = $this->db->update('user', $data, "user_id = $user_id");

		if($sth){
			echo json_encode(array(
				'success' 	=> true,
				'messages' 	=> null,
				'data' 		=> array()
			));
		} else {
			echo json_encode(array(
				'success' 	=> false,
				'messages' 	=> null,
				'data' 		=> array()
			));
		}
	}


	function get_user_bank_acc() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_bank_acc_owner, user_bank_acc, user_bank_branch, 
		user_bank_name, user_bank_address
		FROM user 
		WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function update_user_bank_acc() {
		$user_id = Session::get('user_id');
		$data = array();
		foreach ($_GET as $key => $value) {
			if($key == "url") {
				continue;
			}
			$data["$key"] = $value;
		}
		$sth = $this->db->update('user', $data, "user_id = $user_id");

		if($sth){
			echo json_encode(array(
				'success' 	=> true,
				'messages' 	=> null,
				'data' 		=> array()
			));
		} else {
			echo json_encode(array(
				'success' 	=> false,
				'messages' 	=> null,
				'data' 		=> array()
			));
		}
	}
	

	function get_user_slide() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_slide
		FROM user 
		WHERE user_id = $user_id";
		$result = $this->db->select($query);
		echo json_encode($result);
	}

	function update_user_notification() {
		$user_id = Session::get('user_id');
		$user_notification_email = $_POST['user_notification_email'];
		$data = array(
			"user_notification_email" => $user_notification_email
		);
		$result = $this->db->update("user", $data, "user_id = $user_id");
		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	function get_user_notification_email() {
		$user_id = Session::get('user_id');
		$query = "SELECT user_notification_email
		FROM user 
		WHERE user_id = $user_id";
		$data = $this->db->select($query);
		echo json_encode($data);
	}
}