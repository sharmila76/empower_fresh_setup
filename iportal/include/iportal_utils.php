<?php

function set_iportal_redirect($array) {
	foreach ($array as $key => $value) {
		if (!isset($get_var)) {
			$get_var = "?".$key."=".$value;
		}
		else {
			$get_var .= "&".$key."=".$value;
		}
	}
	header('Location: iportal.php'.$get_var);
}

//TK - Dirty way to sugar reinject code
function redirect($url) {
	/*
	 * If the headers have been sent, then we cannot send an additional location header
	 * so we will output a javascript redirect statement.
	 */
	if (headers_sent()) {
		echo "<script>document.location.href='$url';</script>\n";
	} else {
		//@ob_end_clean(); // clear output buffer
		session_write_close();
		header( 'HTTP/1.1 301 Moved Permanently' );
		header( "Location: ". $url );
	}
	exit();
}

?>