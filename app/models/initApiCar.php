<?php

require_once '../config/config.php';
require_once '../config/Database.php';

function getTableData($table)
{
  $database = \app\config\Database::getInstance();

  $query = "SELECT * FROM $table";
  $data = $database->queryGetAll($query);

  $data_array = json_decode(json_encode($data), true);

  return $data_array;
}

$categories = getTableData("categories");
$fuels = getTableData("fuels");
$transmissions = getTableData("transmissions");

$result = [
  "transmissions" => $transmissions,
  "categories" => $categories,
  "fuels" => $fuels
];

header("Content-Type: application/json");

http_response_code(200);
echo json_encode($result);
