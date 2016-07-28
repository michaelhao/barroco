<?php
if (!isset($_SESSION)) {
  session_start();
}

// Check if entered correct code
if(isset($_POST["captcha"]) && $_POST["captcha"] !="" && $_SESSION["code"] == $_POST["captcha"]) {
	// Do something if the code is correct
	echo "OK";
} else {
	// If code is wrong
	echo "您的驗證碼不正確";
}

?>