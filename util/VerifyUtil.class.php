<?php

class VerifyUtil {
	
	public static function getImage($verify = 'verify') {
		// create four random number
		$randstr = implode('', range(0, 9));
		$randstr = substr(str_shuffle($randstr), 0, 4);
		$_SESSION[$verify] = $randstr;
		// create image
		$im = imagecreatetruecolor(100, 30);
		$white = imagecolorallocate ($im, 255, 255, 255);
		$black = imagecolorallocate($im, 0, 0, 0);
		imagefill($im, 0, 0, $white);
		imagestring($im, 999, 30, 8, $randstr, $black);
		header('Content-Type: image/png');
		imagepng($im);
		imagedestroy($im);
	}
	
	public static function checkCode($code, $is_reset = true, $verify = 'verify') {
		if ($_SESSION[$verify] == strtolower($code)) {
			$b = true;
		} else {
			$b = false;
		}
		if ($is_reset) {
			unset($_SESSION[$verify]);
		}
		return $b;
	}
	
}