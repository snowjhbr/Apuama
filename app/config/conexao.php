<?php
$datasource = "pgsql:host=localhost;port=5432;dbname=sis_car_aluguel";
$user = "postgres";
$pass = "isaac020492.";
try {
    $db = new PDO($datasource, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>



