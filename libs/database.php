<?php
  //class database that will connect to the database
  class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;

    public $DBH;
////////////CONSTRUCT METHOD////////////////
    function __construct() {
      $this->host = DB_HOST;
      $this->username = DB_USER;
      $this->password = DB_PASS;
      $this->dbname = DB_NAME;

      $this->connect();
    }
////////////FUNCTION TO CONNECT TO THE DATABASE/////////////
    function connect() {
      try {
        $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
///////////SELECT METHOD TO 'GET' DATA/////////////
    function select($query) {
      $data = $this->DBH->prepare($query);
      $data->execute();
      $result = $data->fetchAll(PDO::FETCH_ASSOC);
      $num_rows = count($result);
      if ($num_rows > 0) {
        return $result;
      } else {
        return false;
      }
    }
///////////INSERT METHOD TO 'POST' DATA IN DATABASE//////////
    function insert($query) {
      $insert = $this->DBH->query($query);
      if($insert) {
        return $insert;
      } else {
        echo "Post did not insert...";
      }
    }
///////////UPDATE METHOD TO 'PUT/PATCH' DATA IN DATABASE//////////
    function update($query) {
      $update = $this->DBH->query($query);
      if($update) {
        return $update;
      } else {
        echo "Post did not update...";
      }
    }
//////////////DELETE METHOD TO 'DELETE' DATA IN DATABASE////////////
    function delete($query) {
      $delete = $this->DBH->query($query);
      if($delete) {
        return $delete;
      } else {
        echo "Post did not delete...";
      }
    }
  }
 ?>
