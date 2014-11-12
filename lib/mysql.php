<?php

namespace Framework\Lib;


class MySQL {
	private $_host;
	private $_user;
	private $_pass;
	private $_db;
	private $conn;
	
	public function __construct($host, $user, $pass, $db)
	{
		$this->_host = $host;
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_db = $db;
		try {
			$conn = mysql_connect($host, $user, $pass);
		}
	}
}

?>