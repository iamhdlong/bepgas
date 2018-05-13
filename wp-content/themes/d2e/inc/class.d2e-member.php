<?php 
namespace D2e\Inc;

class D2e_member{

	public $reg_errors;
	public function __construct(){
			
	}

	public function registration_form(){ 
		require THEME_PATH."/inc/views/view-register-form-member.php";

		if(!empty($_POST)){
			$this->submit_register();	
		}
		
		
	}	


	public function submit_register() {
	     //global $reg_errors;

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
	    $this->validate_register($username, $email, $password);


	    if ( 1 > count( $this->reg_errors->get_error_messages() ) ) {
	        $userdata = array(
	        'user_login'    =>   $username,
	        'user_email'    =>   $email,
	        'user_pass'     =>   $password,
	        );
	        $user = wp_insert_user( $userdata );
	        echo 'Registration success.';   
	    }

	}

	public function validate_register($username, $email, $password){
		//global $reg_errors;
		$this->reg_errors = new \WP_Error;
		if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
		    $this->reg_errors->add('field', 'username, password, email form field is missing');
		}

		if ( is_wp_error( $this->reg_errors ) ) {
 			//$this->hasErrors = true;
		    foreach ( $this->reg_errors->get_error_messages() as $error ) {
		     
		        echo '<div>';
		        echo '<strong>ERROR</strong>:';
		        echo $error . '<br/>';
		        echo '</div>';
		         
		    }
		 
		}

		// return $reg_errors;

	}









}