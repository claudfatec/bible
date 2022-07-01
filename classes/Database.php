<?php
/**
 * Database
 *
 * A connection to the database
 */
class Database
{

    /**
     * Get the database connection
     *
     * @return PDO object Connection to the database server
     */
    public function getConn()
    {
        $db_host = "localhost";
        $db_name = "teste";
        $db_user = "teste";
        $db_pass = "Teste@teste1";

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
		try {

            $db = new PDO($dsn, $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;

        } catch (PDOException $e) {
            echo $e->getMessage();
			exit;
		}
	}
}







/*{
	$servername = "localhost";
	$database = "teste";
	$username = "teste";
	$password = "Teste@teste1";
// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
	if (mysqli_connect_error()) {
   		echo mysqli_connect_error();
		exit;
	}

	return $conn;
}
*/