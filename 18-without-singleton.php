<?php
$start = microtime(true);

for ($i = 0; $i <= 1000; $i++) {
    $mysqli = new mysqli("localhost", "root", "myroot", "first");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $result = $mysqli->query("SELECT * FROM `MyGuests`");
}
echo microtime(true) - $start;