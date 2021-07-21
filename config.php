<?php

if(!isset($conn)) {
  $conn = new PDO('mysql:host=88.198.85.222:3306;dbname=flumuffel_db4', '${{secrets.SQL_USER}}', '${{secrets.SQL_PASSWORD}}');
}
