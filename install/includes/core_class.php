<?php

class Core {

	// Function to validate the post data
	function validate_post($data)
	{
		/* Validating the host_name, the database name and the db_username. The password is optional. */
		return !empty($data['host_name']) && !empty($data['db_username']) && !empty($data['db_name']);
	}

	// Function to show an error
	function show_message($type,$message) {
		return $message;
	}

	// Function to write the config file
	function write_config($data) {

		// Config path
		$template_path 	= 'config/database.php';
		$output_path 	= '../application/config/database.php';

		// Open the file
		$database_file = file_get_contents($template_path);

		$new  = str_replace("%HOSTNAME%",$data['host_name'],$database_file);
		$new  = str_replace("%USERNAME%",$data['db_username'],$new);
		$new  = str_replace("%PASSWORD%",$data['db_pwd'],$new);
		$new  = str_replace("%DATABASE%",$data['db_name'],$new);

		// Write the new database.php file
		$handle = fopen($output_path,'w+');

		// Chmod the file, in case the user forgot
		@chmod($output_path,0777);

		// Verify file permissions
		if(is_writable($output_path)) {

			// Write the file
			if(fwrite($handle,$new)) {
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}
}