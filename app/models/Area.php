<?php
class Area {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getAreas() {

		$this->db->query("SELECT * FROM areas");

		return $this->db->resultSet(); // return the result from the above query to wherever it is called from the controller.
	}
}