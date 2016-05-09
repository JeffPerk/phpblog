<?php
  //class database that will connect to the database
  class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;

    public $DBH;

    function __construct() {
      $this->host = DB_HOST;
      $this->username = DB_USER;
      $this->password = DB_PASS;
      $this->dbname = DB_NAME;

      $this->connect();
    }

    function connect() {
      try {
        $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }
 ?>
