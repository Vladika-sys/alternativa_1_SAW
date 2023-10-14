<?php

function connectMeToDB() {
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "newsletter";

    $dbConnection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        return $dbConnection;
    }
}

