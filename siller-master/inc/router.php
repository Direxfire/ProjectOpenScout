<?php
class router {
	private $user;

	function __construct() {
		$this->user = new user;
	}

	public function inital() {
		// Check required action paramter
		if(isset($_GET['action'])) {
			// Sanitize action parameter
			$action = strip_tags(htmlentities($_GET['action']));
			// Find appropriate destination
			switch($action) {
				/*
				case('login'):
				// Check if user is logged in
				if(!$this->user->LoginCheck()) {
					// User is not logged in, show login page
					include('pages/login.php');
					die();
				} else {
					// User is logged in, redirect to dashboard
					header('Location: https://siller.io/dashboard');
					die();
				}
				break;
				case('register'):
				// Check if user is logged in
				if(!$this->user->LoginCheck()) {
					// User is not logged in, show register page
					include('pages/register.php');
					die();
				} else {
					// User is logged in, redirect to dashboard
					header('Location: https://siller.io/dashboard');
					die();
				}
				break;
				case('dashboard'):
				// Check if user is logged in
				if($this->user->LoginCheck()) {
					// User is logged in, show dashboard page
					include('pages/dashboard.php');
					die();
				} else {
					// User is not logged in, redirect to login
					header('Location: https://siller.io/login');
					die();
				} 
				break;
				*/
				case('request'):
				include('pages/request/index.php');
				die();
				break;
				case('tos'):
				include('pages/legal/tos.php');
				die();
				break;
				case('privacy'):
				include('pages/legal/privacy.php');
				die();
				break;
				default:
				// Request does not match any conditions
				include('pages/home.php');
				die();
			}
		} else {
			// Action paramter missing
			include('pages/home.php');
			die();
		}
	}
}
?>