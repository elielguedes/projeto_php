<?php
//conecção com banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'concessionaria');

$conn = new mysqli(HOST, USER, PASS, BASE);
