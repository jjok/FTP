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
	 * Rename a file or directory on the server.
	 * @param string $old_name
	 * @param string $new_name
	 * @return boolean
	 */
	public function rename($old_name, $new_name) {
		return ftp_rename($this->connection, $old_name, $new_name);
	}
	
	/**
	 * Delete a file on the server.
	 * @param string $path
	 * @return boolean
	 */
	public function delete($path) {
		return ftp_delete($this->connection, $path);
	}
	
	/**
	 * 
	 * @param string $directory
	 * @return string
	 */
	public function mkdir($directory) {
		return ftp_mkdir($this->connection, $name);
	}

	/**
	 * List files in the given directory.
	 * @param string $directory
	 */
	public function nlist($directory) {
		//print_r(ftp_nlist($this->connection, '.'));
		//print_r(ftp_rawlist($this->connection, '.'));
		return ftp_nlist($this->connection, $directory);
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
