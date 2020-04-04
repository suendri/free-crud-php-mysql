<?php

/**
 * Gosoftware Media Indonesia 2020
 * --
 * --
 * http://gosoftware.web.id
 * http://phpbego.wordpress.com
 * e-mail : cs@gosoftware.web.id
 * WA : 6285263616901
 * --
 * --
 */

namespace App;
use PDO;

class Controller {

	protected object $db;
	private string $dbhost = "localhost";
	private string $dbname = "dbcrudphpmysql";
	private string $dbuser = "root";
	private string $dbpass = "";

	public function __construct()
	{

		try {
			
			$this->db = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . "", $this->dbuser, $this->dbpass);
		
		} catch (PDOException $e) {
			die ("Error ! " . $e->getMessage());
		}
	}
}