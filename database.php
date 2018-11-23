<?php 

class Database
{ 
	private static $dbHost = "localhost";
	private static $dbName = "devhire";
	private static $dbUser = "root";
	private static $dbUserPassword = "";
	
	private static $connection = null; //Initialisation de la variable $connection


public static function connect() {

		try 
		{
			self::$connection = new PDO ('mysql:host=localhost; dbname=devhire; charset=utf8;', 'root', ''); // self:: Permet de se connecter au private static 
		}
		catch(PDOException $e) {
		
			die($e->getMessage());
		}

		return self::$connection;
	}

	public static function disconnect() {

		self::$connection = null;
	}
}

?>