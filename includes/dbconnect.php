<?php
  
function db_connect($server = DB_SERVER, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD, $database = DB_DATABASE, $link = 'db_link') {
  
  global $$link;
  
  $$link = new mysqli($server, $username, $password, $database);
  
  if ($$link) mysqli_select_db($$link, $database) or die("Error Connecting To Database");
  return $$link;
  
}
  
function db_close($link = 'db_link') {
  
  global $$link;
  return mysql_close($$link);
  
}