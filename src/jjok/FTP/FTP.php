<?php

namespace jjok\FTP;

/**
 * 
 * @author Jonathan Jefferies (jjok)
 */
class FTP extends RawFTP {

	const ASCII = FTP_ASCII;
	
	const BINARY = FTP_BINARY;
	
	/**
	 * Log in to an FTP connection.
	 * @param string $user
	 * @param string $password
	 * @return boolean
	 */
	public function login($user = '', $password = '') {
		return @ftp_login($this->connection, $user, $password);
	}

	/**
	 * Download a file from the server.
	 * @param string $local_file
	 * @param string $remote_file
	 * @param integer $mode
	 * @return boolean
	 */
	public function get($local_file, $remote_file, $mode = \FTP_BINARY) {
		return ftp_get($this->connection, $local_file, $remote_file, $mode);
	}

	/**
	 * Upload a file to the server.
	 * @param string $remote_file
	 * @param string $local_file
	 * @param integer $mode
	 * @return boolean
	 */
	public function put($remote_file, $local_file, $mode = \FTP_ASCII) {
		return ftp_put($this->connection, $remote_file, $local_file, \FTP_ASCII);
	}
	
	/**
	 * Rename a file or directory on the server.
	 * @param string $old_name
	 * @param string $new_name
	 * @return boolean
	 */
	public function rename($old_name, $new_name) {
		return ftp_rename($this->connection, $old_name, $new_name);
	}
	
	/**
	 * 
	 * @param string $directory
	 * @return string
	 */
	public function mkdir($directory) {
		return ftp_mkdir($this->connection, $name);
	}

	public function nlist() {
		print_r(ftp_nlist($this->connection, '.'));
		//print_r(ftp_rawlist($this->connection, '.'));
		//return 
	}

	/**
	 * Get the current working directory on the server.
	 * @return string
	 */
	public function pwd() {
		return ftp_pwd($this->connection);
	}
	
	/**
	 * Changes the current working directory on the server.
	 * @param string $name
	 * @return boolean
	 */
	public function chdir($name) {
		return @ftp_chdir($this->connection, $name);
	}

	/**
	 * Changes to the parent directory on the server.
	 * @return boolean
	 */
	public function cdup() {
		return ftp_cdup($this->connection);
	}
}
