<?php

require_once "config/connection.php";

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->exec("DELETE FROM control where id=$id");
}
