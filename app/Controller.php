<?php

/**
 * Gosoftware Media Indonesia 2020
 * --
 * --
 * http://gosoftware.web.id
 * e-mail : cs@gosoftware.web.id
 * WA : 6285263616901
 * --
 * --
 */

namespace App;
use PDO;

class Controller {

	protected $db;
	private $dbhost = "localhost";
	private $dbname = "dbcrudphpmysql";
	private $dbuser = "root";
	private $dbpass = "";

	public function __construct()
	{

        if (session_id() == "") {
            session_start();
        }

		try {
			$this->db = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . "", $this->dbuser, $this->dbpass);
		} catch (PDOException $e) {
			die ("Database tidak terhubung!");
		}
	}
}