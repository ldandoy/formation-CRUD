<?php

    /** Manage data base link */
    function connect()
    {
        $dsn = 'mysql:dbname=zoo;host=127.0.0.1';
        $user = "root";
        $password = 'root';

        try {
            $link = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }

        return $link;
    }

    /** Retrive all data from a table */
    function getAllData($pdo, $table)
    {
        $sql = "SELECT * FROM " . $table;
        $sth = $pdo->prepare($sql);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    /** Retrive a specific row (by Id) */
    function getDataById($pdo, $table, $id)
    {
        $sql = "SELECT * FROM " . $table ." WHERE id = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    /** Delete a specific row (by Id) */
    function deleteDataById($pdo, $table, $id)
    {
        $sql = "DELETE FROM " . $table ." WHERE id = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute(array($id));
    }

    /** 
     * Delete a specific row (by Id)
     * $datas = ["id" => 1, "name" => "Tigre", "couleur" => "gris"]
     * $sql = "UDATE animaux SET name = "Tigre", couleur = "gris" WHERE id = 1
     * $sql = "UDATE animaux SET name = :name, couleur = :couleur WHERE id = :id
     */
    function updateDataById($pdo, $table, $datas)
    {
        $sql = "UPDATE " . $table . " SET ";

        foreach ($datas as $key => $value)
        {
            if ($key != "id") {
                $sql .= $key . " = :".$key;
            }
        }

        $sql .= " WHERE id = :id";
        $sth = $pdo->prepare($sql);
        return $sth->execute($datas);
    }

    /** 
     * Insert data
     * 
     * $sql = INSERT INTO table (champs1,champs2...) VALUES (valeur1, valeur2...);
     */
    function insertDataById($pdo, $table, $datas)
    {
        $sql = "INSERT INTO " . $table . '(';
        foreach ($datas as $key => $value)
        {
            $sql .= $key .', ';
        };
        $sql .= 'id';
        $sql .= ') VALUES (';
        foreach ($datas as $key => $value)
        {
            $sql .= ':'.$key .', ';
        };
        $sql .= 'null';
        $sql .= ');';
        // echo $sql;
        $sth = $pdo->prepare($sql);
        return $sth->execute($datas);
    }