<?php
	$confirmation_subject = 'Successfuly Registered';

	$Sender = 'DoctorT <Email>';

	$msg = "You have successfuly rigestered to Doctor T course";

	mail ($_POST['email'], $confirmation_subject, $msg, 'From: '.$Sender );

?>
