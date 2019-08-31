<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_user extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
		if(!$this->user->loggedin) {
			redirect(site_url("hideend/login"));
		}
		
		// If the user does not have premium. 
		// -1 means they have unlimited premium
		if($this->settings->info->global_premium && 
			($this->user->info->premium_time != -1 && 
				$this->user->info->premium_time < time()) ) {
			$this->session->set_flashdata("globalmsg", lang("success_29"));
			redirect(site_url("hideend/funds/plans"));
		}
	}

	public function index($username="") 
	{
		if(empty($username)) $this->template->error(lang("error_51"));

		$user = $this->user_model->get_user_by_username($username);
		
		print_r("test");die;
		if($user->num_rows() == 0) $this->template->error(lang("error_52"));
		$user = $user->row();

		if($user->user_role == -1) $this->template->error(lang("error_53"));

		$groups = $this->user_model->get_user_groups($user->ID);
		$fields = $this->user_model->get_custom_fields_answers(array(
			"profile" => 1), $user->ID);

		$this->template->loadContent("hidepage/profile/index.php", array(
			"user" => $user,
			"groups" => $groups,
			"fields" => $fields
			)
		);
	}	
	
	public function cek($username="") 
	{
		if(empty($username)) $this->template->error(lang("error_51"));

		$user = $this->user_model->get_user_by_username($username);
		
		print_r("test");die;
		if($user->num_rows() == 0) $this->template->error(lang("error_52"));
		$user = $user->row();

		if($user->user_role == -1) $this->template->error(lang("error_53"));

		$groups = $this->user_model->get_user_groups($user->ID);
		$fields = $this->user_model->get_custom_fields_answers(array(
			"profile" => 1), $user->ID);

		$this->template->loadContent("hidepage/profile/index.php", array(
			"user" => $user,
			"groups" => $groups,
			"fields" => $fields
			)
		);
	}

}

?>