<?php 



class Database

{ 
	private static $dbHost = "localhost";
	private static $dbName = "devhire";
	private static $dbUser = "root";
	private static $dbUserPassword = "root";

	
	private static $connection = null; //Initialisation de la variable $connection



public static function connect() {


		try 

		{

			self::$connection = new PDO ('mysql:host=localhost; dbname=devhire; charset=utf8; port=3307;', 'root', 'root'); // self:: Permet de se connecter au private static 

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

