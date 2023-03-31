<?php

function connection()
{
    try {
        return new PDO('mysql:host=localhost;dbname=online_shop;charset=utf8', 'admin', 'asennus');
    } catch (PDOException $e) {
        throw new RuntimeException('Failed to connect to database: ' . $e->getMessage());
    }
}
