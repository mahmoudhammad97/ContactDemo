<?php
	//check number his lenght is 11 and not contain letters and symbols =================================
	function check_number($num){
		$check_len  = (strlen($num) == 11)? true : false;	//check lenght of digit
		$check_char  = (is_numeric($num))? true : false;	//check is a number and not contain letters and symbols
		return ($check_len == true && $check_char == true)? true : false;
	}
	
	//check if same name is exist =================================
	function checkName_is_founed($name){
		//get name if it found to not duplicate name in contacts
		$q   = "SELECT `Name` FROM `name_contact` WHERE `Name`='".$name."'";
		$res = $GLOBALS['connect']->query($q);
		return ($res->num_rows > 0)? true : false;	//if number then it true and if zero then it false
	}
?>