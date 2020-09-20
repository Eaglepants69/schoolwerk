<?php

class Mening{

    public function __construct()
    {
        $user = 'root';
        $pass = '';

        $this->db_conn = new PDO('mysql:host=localhost;dbname=pp', $user, $pass);
    }

    public function geef_mening($user_id, $stelling_id, $antwoord)
    {
        //ZET WAARDE IN DATABASE
        $sql = "INSERT INTO mening (user_id, stelling_id, antwoord) VALUES (:user_id, :stelling_id, :antwoord)" ;
        $stmt = $this->db_conn->prepare($sql); //stuur naar mysql.
        $stmt->bindParam(":user_id", $user_id );
        $stmt->bindParam(":stelling_id", $stelling_id );
        $stmt->bindParam(":antwoord", $antwoord );
        $stmt->execute();
    }
}