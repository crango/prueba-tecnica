<?php

/*
 * PDO DATABASE CLASS
 */

class Database {
	/*
		     * The properties are what we need to connect to the database
	*/
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;
	private $dbchar = DB_CHAR;

	// Database handler, we use it whenever we prepare SQL statements
	private $dbh;
	private $stmt; // for the actual statement
	private $err; // whenever we have an error, we store it here

	public function __construct() {
		// Set DSN
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . $this->dbchar;
		// couple of options to use alongside dsn, not necessary but goo for enhancement
		// check doc for more options if you need one
		$options = array(
			PDO::ATTR_PERSISTENT => true, // This would persist db connection, and thus improve performance by checking if a db is already connected
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Handles error elegantly, e.g we can  catch errors easily
		);

		// Create PDO instance
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch (PDOException $e) {
			// Catches PDOException if it is thrown
			$this->err = $e->getMessage();
			echo $this->err;
		}

	}

	public function query($sql) {
		$this->stmt = $this->dbh->prepare($sql);
	}

	/*
		         * This is the bind the values
		         * Binds a value to a corresponding named or question mark placeholder in the SQL statement that was used to prepare the statement.
		         *
		         * Learn more about switch-case statement here: https://devsrealm.com/web-dev/php/conditional-statements-in-php/#Switch-Case_Statements
	*/
	public function bind($param, $value, $type = null) {
		if (is_null($type)) {
			switch (true) {
			case is_int($value): // if the value is an integer, set the $type to int
				$type = PDO::PARAM_INT;
				break;
			case is_bool($value): // if the value is an integer, set the $type to bool
				$type = PDO::PARAM_BOOL;
				break;
			case is_null($value): // if the value is an integer, set the $type to null
				$type = PDO::PARAM_NULL;
				break;
			default: // if otherwise, set it to string
				$type = PDO::PARAM_STR;
			}
		}
		/*
			             * This function would actually bind the values, don't forget we are still within the public function bind() block,
			             * so, we can access the $param, $value, $type below: $this->stmt->bindValue($param, $value, $type);
			             *
		*/

		$this->stmt->bindValue($param, $value, $type);
	}

	// We then Execute the prepared statement
	public function execute() {
		return $this->stmt->execute(); // return the statement to wherever it is been called
	}

	// Get result set as array of objects if more than one row
	public function resultSet() {
		$this->execute(); // calling the execute function. The one we created above
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// Get single record as object for single row
	public function single() {
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	// Get row count
	public function rowCount() {
		return $this->stmt->rowCount();
	}
}
