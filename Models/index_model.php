<?php
/**
 *
 */
class index_model extends Model {

	function __construct() {
		parent::__construct();
	}
	
	public function loadDistrict() {
		$sql = <<<SQL
SELECT *
FROM district
ORDER BY district_name ASC
SQL;
		$select = $this -> db -> select($sql);
		if($select){
			echo json_encode($select);
		}else{
			echo '[]';
		}
	}
	
	function loadTopServiceList() {
		$select = $this -> db -> select('SELECT * 
							   FROM `user_service` 
							   WHERE `user_service_delete_flg` = 0 order by `user_service_id` desc 
							   limit 3');
		if($select){
			echo json_encode($select);
		}else{
			echo '[]';
		}		
	}
	
	function loadNewServiceList() {
		$select = $this -> db -> select('SELECT * 
							   FROM `user_service` 
							   WHERE `user_service_delete_flg` = 0 order by `user_service_id` desc 
							   limit 8');
		if($select){
			echo json_encode($select);
		}else{
			echo '[]';
		}		
	}
	
	function loadLocation(){
		$select = $this -> db -> select('SELECT DISTINCT 
										   user.user_id, 
										   user.user_business_name, 
										   user.user_logo, 
										   user.user_description 
										   FROM user_service, user, group_service
										   WHERE user.user_id = group_service.group_service_user_id
										   AND user_service.user_service_group_id = group_service.group_service_id
										   AND user.user_delete_flg = 0 order by user.user_id desc
										   limit 8');
		if($select){
			echo json_encode($select);
		}else{
			echo '[]';
		}	
	}

	function loadServiceDetail($user_service_id = 1) {
		$evoucher_due_date = EVOUCHER_DUE_DATE;
		$query=<<<SQL
SELECT 
user_service.`user_service_id`,
user_service.`user_service_name`,
user_service.`user_service_duration`,
user_service.`user_service_full_price`,
user_service.`user_service_sale_price`,
user_service.`user_service_status`,
user_service.`user_service_image`,
user_service.`user_service_description`,
user_service.`user_service_use_evoucher`,
user_service.`user_service_group_id`,
user_service.`user_service_service_id`,
user.`user_id`,
user.`user_business_name`,
user.`user_description`,
user.`user_open_hour`,
user.`user_is_use_voucher`,
user.`user_long`,
user.`user_lat`,
user.`user_address`,
user.`user_phone`,
user.`user_email`,
user.`user_limit_before_service`,
user.`user_limit_before_booking`,
group_service.`group_service_name`,
DAYOFWEEK(CURRENT_DATE) AS day_of_week,
DAYOFMONTH(CURRENT_DATE) AS day_of_month,
YEAR(CURRENT_DATE) AS year,
MONTH(CURRENT_DATE) AS month,
HOUR(CURRENT_TIME) as hour,
MINUTE(CURRENT_TIME) as minute,
DATE_ADD(CURRENT_DATE, INTERVAL {$evoucher_due_date} MONTH) as evoucher_due_date
FROM user_service,user,group_service
WHERE user.user_id = group_service.group_service_user_id
AND user_service.user_service_group_id = group_service.group_service_id
AND`user_service_delete_flg` = 0 AND `user_service_id`= {$user_service_id}
SQL;
		
		$select = $this -> db -> select($query);
		if($select){
			echo json_encode($select);
		}else{
			echo '[]';
		}		
	}

}
?>