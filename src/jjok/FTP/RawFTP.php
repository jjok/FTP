<?php

namespace jjok\FTP;

/**
 * 
 * @author Jonathan Jefferies
 * @version 0.1.0
 */
class RawFTP {

	/**
	 * The FTP connection.
	 * @var resource
	 */
	protected $connection;
	
	/**
	 * Close the connection automatically when instance is destroyed.
	 */
	public function __destruct() {
		if(is_resource($this->connection)) {
			$this->close();
		}
	}
	
	/**
	 * Opens an FTP connection.
	 * @param string $server
	 * @param number $port
	 * @param number $timeout
	 * @return boolean
	 */
	public function connect($server, $port = 21, $timeout = 90) {
		$this->connection = ftp_connect($server, $port, $timeout);
	
		return $this->connection !== false;
	}

	/**
	 * Closes the current connection.
	 * @return boolean
	 */
	public function close() {
		return ftp_close($this->connection);
	}
	
	/**
	 * Send a command to the server.
	 * @param string $command
	 * @return array The server response.
	 */
	public function raw($command) {
		return ftp_raw($this->connection, $command);
	}
	
	/**
	 * Request execution of a command on the FTP server.
	 * @param string $command
	 * @return boolean
	 */
	public function exec($command) {
		return @ftp_exec($this->connection, $command);
	}
}
