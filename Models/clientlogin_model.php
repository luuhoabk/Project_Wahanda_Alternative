<?php
/**
 * 
 */
class clientlogin_model extends Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function clientLogin($data){
		$sql = "SELECT client_id FROM client WHERE client_email = :client_email AND client_pass = :client_pass";

		$client = array(
				':client_email' 		=> $data['email_login'],
				':client_pass' 	=> Hash::create('md5', $data['pass_login'], HASH_PASSWORD_KEY)
			);
		$result = $this -> db -> select($sql, $client);
		if(isset($result[0]['client_id'])){
			Session::init();
			Session::set('client_id', $result[0]['client_id']);
		}
		echo json_encode($result);
	}
	
}

?>