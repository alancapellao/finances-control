<?php

require_once "config/connection.php";

$entrada = $conn->prepare("SELECT sum(valor) from control where tipo = 'Entrada';");
$saida = $conn->prepare("SELECT sum(valor) from control where tipo = 'Saída';");
$total = $conn->prepare("SELECT sum(valor) from control;");
