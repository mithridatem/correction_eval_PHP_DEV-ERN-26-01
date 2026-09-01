<?php

include '../env.php';

function connect_bdd(): PDO
{
    return new PDO(
        'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME,
        BDD_USERNAME,
        BDD_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
