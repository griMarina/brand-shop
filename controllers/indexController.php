<?php

function index_controller($params)
{
    // $pdo = connection();
    // $statement = $pdo->query('SELECT * FROM product WHERE id=1');
    // $row = $statement->fetch(PDO::FETCH_ASSOC);

    $params['title'] = 'Home';
    return $params;
}
