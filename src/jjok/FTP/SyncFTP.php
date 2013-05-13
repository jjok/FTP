<?php

namespace jjok\FTP;

/**
 * 
 * @author Jonathan Jefferies (jjok)
 */
class SyncFTP extends FTP {

	/**
	 * Download a file from the server.
	 * @param string $local_file
	 * @param string $remote_file
	 * @param integer $mode
	 * @param number $resumepos
	 * @return boolean
	 */
	public function get($local_file, $remote_file, $mode = \FTP_BINARY, $resumepos = 0) {
		return @ftp_get($this->connection, $local_file, $remote_file, $mode, $resumepos);
	}
	
	/**
	 * Upload a file to the server.
	 * @param string $remote_file
	 * @param string $local_file
	 * @param integer $mode
	 * @param number $resumepos
	 * @return boolean
	 */
	public function put($remote_file, $local_file, $mode = \FTP_ASCII, $resumepos = 0) {
		return ftp_put($this->connection, $remote_file, $local_file, $mode, $resumepos);
	}
}
