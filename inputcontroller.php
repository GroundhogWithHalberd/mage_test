<?php

include 'connection.php';
include 'data.php';
include 'db.php';

$Data = new DataBase($db);
if (validEmail($_POST['email'], $_POST['tos']) == true){
	$unit = new Data ($_POST['email'], date('YYYY-MM-DD HH:MI:SS'));
}

$Data->addEmail($unit);

function validEmail($subject, $check){
		$pattern = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/";
		$bannedpattern = "/.co$/";
		if ($check == off){
			echo '<script language="javascript">';
			echo 'alert("Error: You must accept the terms and conditions")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0'>";
			return false;
		}
		if (!isset($subject)) {
			echo '<script language="javascript">';
			echo 'alert("Error: Email address is required")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0'>";
			return false;
		}
		if (preg_match ($pattern , $subject)) {
			if (!preg_match ($bannedpattern , $subject)) return true;
			else {
				echo '<script language="javascript">';
				echo 'alert("Error: We are not accepting subscriptions from Colombia emails")';
				echo '</script>';
				echo "<meta http-equiv='refresh' content='0'>";
				return false;
			}
		}

		else {
			echo '<script language="javascript">';
			echo 'alert("Error: Please provide a valid e-mail address")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0'>";
			return false;
		}
	}