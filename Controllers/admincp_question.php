<?php

/**
 *
 */
class admincp_question extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/question/css/question.css');
		$this -> view -> script = array(URL . 'Views/admincp/question/js/question.js');
		$this -> view -> render_admincp('question/index');
	}

	public function loadServiceTypeList() {
		Auth::handleAdminLogin();
		$this -> model -> loadServiceTypeList();
	}

	public function loadQuestionList() {
		Auth::handleAdminLogin();
		if (isset($_POST['service_type_id'])) {
			$this -> model -> loadQuestionList($_POST['service_type_id']);
		}
	}

	public function addQuestionDetail() {
		Auth::handleAdminLogin();
		$this -> view -> style = array(URL . 'Views/admincp/question/css/question.css');
		$this -> view -> script = array(URL . 'Views/admincp/question/js/question.js');
		$this -> view -> render_admincp('question/add');
	}

	public function addQuestion() {
		Auth::handleAdminLogin();
		if (isset($_POST['question_answer']) && isset($_POST['question_service_type_id']) && isset($_POST['question_content'])) {
			$data['question_answer'] = $_POST['question_answer'];
			$data['question_service_type_id'] = $_POST['question_service_type_id'];
			$data['question_content'] = $_POST['question_content'];
			$this -> model -> addQuestion($data);
		}
	}

}
