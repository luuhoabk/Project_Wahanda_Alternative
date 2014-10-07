<?php
require (dirname(__FILE__).'/spaCMS_model/spaCMS_home_model.php');
require (dirname(__FILE__).'/spaCMS_model/spaCMS_calendar_model.php');
require (dirname(__FILE__).'/spaCMS_model/spaCMS_menu_model.php');
require (dirname(__FILE__).'/spaCMS_model/spaCMS_reports_model.php');
require (dirname(__FILE__).'/spaCMS_model/spaCMS_settings_model.php');

class SpaCMS_Model extends Model {
	function __construct(){
		parent::__construct();
	}

	function login(){
		$user_email 	= $_POST['user_email'];
		$user_password 	= $_POST['user_password'];
		$sql = "SELECT user_id, user_business_name FROM user WHERE user_email = :user_email AND user_password = :user_password";

		$user = array(
				':user_email' 		=> $user_email,
				':user_password' 	=> Hash::create('md5', $user_password, HASH_PASSWORD_KEY)
			);

		$sth = $this->db->prepare($sql);
		$sth->execute($user);
		$count = $sth->rowCount();

		if($count > 0){
			$result = $sth->fetch(PDO::FETCH_ASSOC);
			Session::init();
			Session::set('spaCMS', true);
			Session::set('user_id', $result['user_id']);
			Session::set('user_email', $user_email);
			Session::set('user_business_name', $result['user_business_name']);
			header('location:'.URL.'spaCMS/home');
		} else {
			header('location:'.URL.'spaCMS');
			return false;
		}

	}

	function logout() {
		Session::init();
		Session::destroy();
		header('location:'.URL.'spaCMS');
		exit;
	}


	///////////////////////////// MENU //////////////////////////
	function get_group_user_service() {
		SpaCMS_Menu_Model::get_group_user_service();
	}

	function insert_user_service() {
		SpaCMS_Menu_Model::insert_user_service();
	}

	function update_user_service() {
		SpaCMS_Menu_Model::update_user_service();
	}

	function delete_user_service() {
		SpaCMS_Menu_Model::delete_user_service();
	}

	function get_user_service_featured() {
		SpaCMS_Menu_Model::get_user_service_featured();
	}

	function delete_user_service_featured() {
		SpaCMS_Menu_Model::delete_user_service_featured();
	}
	
	function get_service_system() {
		SpaCMS_Menu_Model::get_service_system();
	}
	
	function insert_group_service() {
		SpaCMS_Menu_Model::insert_group_service();
	}
	
	function update_group_service() {
		SpaCMS_Menu_Model::update_group_service();
	}
	
	function delete_group_service() {
		SpaCMS_Menu_Model::delete_group_service();
	}

	///////////////////////////// REPORTS //////////////////////////
	function get_booking_detail() {
		SpaCMS_Reports_Model::get_booking_detail();
	}

	function get_sales_report() {
		SpaCMS_Reports_Model::get_sales_report();
	}

	// function get_sales_report() {
	// 	SpaCMS_Reports_Model::get_sales_report();
	// }

	///////////////////////////// SETTING //////////////////////////
	function get_type_business() {
		SpaCMS_Settings_Model::get_type_business();
	}

	function get_country() {
		SpaCMS_Settings_Model::get_country();
	}

	function get_user_detail() {
		SpaCMS_Settings_Model::get_user_detail();
	}

	function update_user_detail() {
		SpaCMS_Settings_Model::update_user_detail();
	}


	function get_user_open_hour() {
		SpaCMS_Settings_Model::get_user_open_hour();
	}

	function update_user_open_hour() {
		SpaCMS_Settings_Model::update_user_open_hour();
		
	}

	function get_user_is_use_voucher() {
		SpaCMS_Settings_Model::get_user_is_use_voucher();
	}

	function update_user_is_use_voucher() {
		SpaCMS_Settings_Model::update_user_is_use_voucher();
	}

	function get_user_company() {
		SpaCMS_Settings_Model::get_user_company();
	}

	function update_user_company() {
		SpaCMS_Settings_Model::update_user_company();
	}


	function get_user_bank_acc() {
		SpaCMS_Settings_Model::get_user_bank_acc();
	}

	function update_user_bank_acc() {
		SpaCMS_Settings_Model::update_user_bank_acc();
	}


	function get_user_slide() {
		SpaCMS_Settings_Model::get_user_slide();
	}

}