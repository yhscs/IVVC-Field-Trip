<?php
   define('DB_SERVER', 'SERVER');
   define('DB_USERNAME', 'USER');
   define('DB_PASSWORD', 'PASS');
   define('DB_DATABASE', 'DB');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>