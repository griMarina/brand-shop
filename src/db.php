<?php

function connection()
{
    try {
        return new PDO('mysql:host=localhost;dbname=online_shop;charset=utf8', 'admin', 'asennus');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
