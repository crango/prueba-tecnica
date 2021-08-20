<?php
class Rol {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getRoles() {

		$this->db->query("SELECT * FROM roles");

		return $this->db->resultSet(); // return the result from the above query to wherever it is called from the controller.
	}
}