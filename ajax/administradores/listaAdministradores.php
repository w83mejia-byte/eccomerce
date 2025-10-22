<?php

declare(strict_types=1);
header('Content_Type: application/json; charset=utf-8');

require_once __DIR__.'/../../Models/AdminsModel.php';

// Parámetros Datatables

$draw           = (int)($_GET['draw'] ?? 1);
$start          = (int)($_GET['start'] ?? 0);
$length         = (int)($_GET['length'] ?? 10);
$search         = $_GET['search']['value'] ?? '';
$orderIdx       = (int)($_GET['ORDER'][0]['column'] ?? 0);
$orderDir       =(($_GET['order'][0]['dir'] ?? 'asc') === 'desc') ? 'DESC' : 'ASC';

//MAPEAR ÍNDICES DE COLUMNAS DATATABKES -> NOMBRES REALES DE BD
$columnas = ['id_administrador','nombre_administrador','email_administrador', 'rol_administrador','ultimo_login_administrador'];

$orderCol = $columnas[$orderIdx] ?? 'id_administrador';

//Consulta al modelo
$respuesta = AdminsModel::getDataTable([
    'start'         => $start,
    'length'        => $length,
    'search'        => $search,
    'orderCol' => $orderCol,
    'orderDir'      => $orderDir
]);


echo '<pre>';print_r($respuesta);echo '</pre>';
return;
