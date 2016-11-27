<?php

/*
  $serv="C:/wamp/www/control_de_estudios"; //nombre del servidor
  $bd="controlestudio";  //nombre de la base de datos
  $usr="root"; //usuario para conectarse a la base de datos
  $pwd=""; //password del usuario
  //hay que poner la ruta exacta en la que se encuentra el archivo mysqldump
  //en mi caso es asi, primero va entre comillas simples y después se ponen comillas dobles.
  $mysqldump='"C:/wamp/bin/mysql/mysql5.6.12/bin/mysqldump.exe"';
  //el nombre del backup llevara la fecha y hora del servidor:
  $nombre_back=date("dnY-h_i_s");

  passthru("$mysqldump $bd -h $serv -u $usr -p$pwd > nombre_back.sql");

 */


require_once("../libs/mysql_dump/mysql.dump.php");

$mdump = new MYSQL_DUMP('localhost', 'root', '');

$resp = @$mdump->dumpDB('proyecto_bd');
//print_r($resp);
$nombre = "RESPALDO - " . date('Ymd H_i_s') . ".sql";
file_put_contents('backups/' . $nombre, $resp);

$listas  = @file_get_contents('listas.txt');
$listas .= "{$nombre}\n";
file_put_contents('listas.txt', $listas);

header('location: respaldos.php');