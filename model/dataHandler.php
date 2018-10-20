<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function openConnection() {
    include '../config/config.php';
    try {
        $dbh = new PDO("mysql:host=$db_host;dbname=$database", $db_user, $db_pass);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
//        echo "Connected successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbh;
}

function insertInDatabase($sql) {
    try{
    $dbh= openConnection();
    $stmt = $dbh->exec($sql);
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    $dbh=null;
}

function rowCount($sql) {
    try{
    $dbh= openConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $numRow = $stmt->rowCount();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    $dbh=null;
    return $numRow;
}

function update($sql) {
    try{
    $dbh= openConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();        
    }
    $dbh=null;
}

function showData($sql) {
    try{
    $dbh= openConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    } catch (PDOException $e){
        echo $e->getMessage();        
    }
        $dbh=null;
    return $result;
}
