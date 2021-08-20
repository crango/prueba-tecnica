<?php

class Empleado {
	private $db;

	public function __construct() {
		$this->db = new Database;
	}

	public function getEmpleados() {

		$this->db->query("SELECT * FROM empleados");

		return $this->db->resultSet(); // return the result from the above query to wherever it is called from the controller.
	}
}
