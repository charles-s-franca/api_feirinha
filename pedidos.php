<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$body = file_get_contents('php://input');

$dados = json_decode($body);

print_r($dados->produtos);