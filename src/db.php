<?php

function connection()
{
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    } catch (PDOException $e) {
        throw new RuntimeException('Failed to connect to database: ' . $e->getMessage());
    }
}
