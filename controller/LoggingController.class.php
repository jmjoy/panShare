<?php

class LoggingController {
	
	public function register() {
		display();
	}
	
	public function ajaxCheck() {
		if (!isset($_GET['mod'])) {
			echo '0';
			return;
		}
		switch ($_GET['mod']) {
		case 'email':
			echo '1';
			break;
			
		case 'username':
			echo '1';
			break;
			
		case 'verify':
			if (!isset($_POST['arg'])) {
				echo '0';
				return;
			}
			if (!VerifyUtil::checkCode($_POST['arg'], false)) {
				echo '0';
				return;	
			}
			echo '1';
			break;
		}
	}
	
	public function verifyImage() {
		VerifyUtil::getImage();
	}
}