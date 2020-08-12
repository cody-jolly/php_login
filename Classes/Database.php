<?php

class Database
{
    public $mysqli;
    protected $error;

    public function __construct()
    {
        $host = $_SESSION['config']['host'];
        $db = $_SESSION['config']['db'];
        $user = $_SESSION['config']['user'];
        $password = $_SESSION['config']['password'];


        if ($_SESSION['config']['showError'] == 1) {
            //Durch die DB erzeugte Fehler sollen angezeigt, bzw. durch PHP reported werden
            ini_set("display_errors", true);
            ini_set("error_reporting", E_ALL | E_STRICT);
        } else {
            ini_set("display_errors", false);
        }

        $this->mysqli = new mysqli($host, $user, $password, $db);

        //Zeichensatz der DB-Übertragungen festlegen
        $this->mysqli->query("SET NAMES 'utf8");
    }

    public function escape($input)
    {
        return $this->mysqli->real_escape_string($input);
    }
}

class DatabaseInput extends Database
{
    private $sql;
    private $execute;

    #die __construct() Methode wird zuerst abgearbeitet
    public function __construct() {

        #es wird die __construct() Methode der Elternklasse ausgeführt
        parent::__construct();
    }

    //SQL Befehl für die DB an die Methode SETsqlinputstring senden
    public function SETsqlInput($inputString)
    {
        #Der Inputstring wird in die Klasse geschrieben und als Eigenschaft dieser gespeichert
        $this->sql = $inputString;
        $this->doQuery();
    }

    private function doQuery()
    {
        if($this->mysqli->query($this->sql) === TRUE) {
            #An dieser Stelle wird bestätigt, dass der Datensatz richtig angelegt wurde
            $this->execute = 1;
        } else {
            #An dieser Stelle wird ein Eventueller Fehler beschrieben. Der Dtanesatz wurde nicht angelegt.
            $this->error = "ERROR: " . $this->sql . "<br>" . $this->mysqli->error;
            $this->execute = 0;
        }
    }

    public function GETexecute()
    {
        return $this->execute;
    }

    public function GETerror()
    {
        return $this->error;
    }

    public function __destruct()
    {
        //Verbindung zur Datenbank schließen
        $this->mysqli->close();
    }
}

class DatabaseOutput extends Database
{
    private $sqlString;
    private $sqlReturn;


    public function __construct()
    {
        parent::__construct();
    }

    public function SETsqlInput($selectString)
    {
        $this->sqlString = $selectString;
        $this->doQuery();
    }

    public function doQuery()
    {
        $this->sqlReturn = mysqli_query($this->mysqli, $this->sqlString);
    }

    public function GETassoc()
    {
        return mysqli_fetch_assoc($this->sqlReturn);
    }

    public function GETrows()
    {
        return mysqli_num_rows($this->sqlReturn);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
