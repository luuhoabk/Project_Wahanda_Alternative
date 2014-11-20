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

		// if($sth){
		// 	echo json_encode(array(
		// 		'success' 	=> true,
		// 		'messages' 	=> null,
		// 		'data' 		=> array()
		// 	));
		// } else {
		// 	echo json_encode(array(
		// 		'success' 	=> false,
		// 		'messages' 	=> null,
		// 		'data' 		=> array()
		// 	));
		// }

		if($sth) {
			echo 'success';
		} else {
			echo 'error';
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

	
	////////////////////////////// ONLINE BOOKING ////////////////////////
	public function get_user_limit_before_booking() {
		$user_id = Session::get('user_id');

		$aQuery = <<<SQL
		SELECT 
			user_limit_before_booking,
			user_limit_before_service
		FROM 
			user
		WHERE 
			user_id = {$user_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function get_user_is_use_gvoucher() {
		$user_id = Session::get('user_id');

		$aQuery = <<<SQL
		SELECT 
			user_is_use_gvoucher
		FROM 
			user
		WHERE 
			user_id = {$user_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function get_user_is_use_evoucher() {
		$user_id = Session::get('user_id');

		$aQuery = <<<SQL
		SELECT 
			user_is_use_evoucher
		FROM 
			user
		WHERE 
			user_id = {$user_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function get_user_is_use_appointment() {
		$user_id = Session::get('user_id');

		$aQuery = <<<SQL
		SELECT 
			user_is_use_appointment
		FROM 
			user
		WHERE 
			user_id = {$user_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function update_online_booking() {
		$user_id = Session::get('user_id');

		if(isset($_POST['user_is_use_evoucher'])) {
			if($_POST['user_is_use_evoucher'] == true) {
				$user_is_use_evoucher = 1;
			}
		} else {
			$user_is_use_evoucher = 0;
		}

		if(isset($_POST['user_is_use_gvoucher'])) {
			if($_POST['user_is_use_gvoucher'] == true) {
				$user_is_use_gvoucher = 1;
			}
		} else {
			$user_is_use_gvoucher = 0;
		}

		if(isset($_POST['user_is_use_appointment'])) {
			if($_POST['user_is_use_appointment'] == true) {
				$user_is_use_appointment = 1;
			}
		} else {
			$user_is_use_appointment = 0;
		}

		$data = array(
			"user_limit_before_service" => $_POST["user_limit_before_service"],
			"user_limit_before_booking" => $_POST["user_limit_before_booking"],
			"user_is_use_evoucher" 		=> $user_is_use_evoucher,
			"user_is_use_gvoucher" 		=> $user_is_use_gvoucher,
			"user_is_use_appointment"	=> $user_is_use_appointment
		);

		$result = $this->db->update("user", $data, "user_id = $user_id");

		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	////////////////////////// BẢO MẬT /////////////////////
	public function update_user_password() {
		$user_id = Session::get('user_id');
		$user_password_new = $_POST['user_password_new'];
		$user_password = $_POST['user_password'];
		$data = array();
		if( !self::check_user_password($user_password) ) {
			echo 'password_error';
		} else {

			$data = array(
				"user_password" => Hash::create('md5', $user_password_new, HASH_PASSWORD_KEY)
			);

			$result = $this->db->update("user", $data, "user_id = $user_id");

			if($result) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}

	public function check_user_password( $user_password ) {
		$user_id = Session::get('user_id');

		$sql = "SELECT user_id FROM user WHERE user_id = :user_id AND user_password = :user_password";

		$user = array(
				':user_id' 		=> $user_id,
				':user_password' 	=> Hash::create('md5', $user_password, HASH_PASSWORD_KEY)
			);

		$sth = $this->db->prepare($sql);
		$sth->execute($user);
		$count = $sth->rowCount();

		if($count > 0) {
			return true;
		}

		return false;
	}




	public function get_user_map() {
		$user_id = Session::get('user_id');

		$aQuery = <<<SQL
		SELECT 
			user_lat, 
			user_long
		FROM user
		WHERE user_id = {$user_id}
SQL;
		$data = $this->db->select($aQuery);

		echo json_encode($data[0]);
	}

	public function update_user_map() {
		$user_id = Session::get('user_id');

		$data = array(
			"user_lat" => $_POST["user_lat"],
			"user_long" => $_POST["user_long"]
		);

		$result = $this->db->update('user', $data, "user_id = $user_id");
		
		if($result) {
			echo 'success';
		} else {
			echo 'error';
		}
	}



}