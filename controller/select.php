<?php

require_once "config/connection.php";

$sql = $conn->prepare("SELECT * FROM control");
