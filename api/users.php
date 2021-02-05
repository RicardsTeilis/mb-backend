<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

if (isset($_GET['page'])) {
    $currentPage = htmlspecialchars(strip_tags($_GET['page']));
} else {
    $currentPage = 1;
}

if (isset($_GET['orderBy'])) {
    $orderBy = htmlspecialchars(strip_tags($_GET['orderBy']));
} else {
    $orderBy = 'dateCreated';
}

if (isset($_GET['filterBy']) && $_GET['filterBy'] != 'none') {
    $filterBy = htmlspecialchars(strip_tags($_GET['filterBy']));
} else {
    $filterBy = null;
}

if ($currentPage > 1) {
    $previousPage = $currentPage - 1;
} else {
    $previousPage = null;
}

$result = $user->read($currentPage, $filterBy, $orderBy);

$totalRows = $result['totalRows'];
$totalPages = $result['totalPages'];
$rowsPerPage = $result['rowsPerPage'];

if ($currentPage > 1) {
    $previousPage = $currentPage - 1;
} else {
    $previousPage = null;
}

$nextPage = $currentPage + 1;

if ($nextPage > $totalPages) {
    $nextPage = null;
}

if ($totalRows > 0) {
    $usersArr = array();
    $usersArr['userData'] = array();

    $totalPagesArr = [];

    $providersArr = [];

    for($i = 0; $i < $totalPages; $i++) {
        array_push($totalPagesArr, $i + 1);
    }

    while ($row = $result['stmt']->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $userItem = array(
            'id' => $id,
            'dateCreated' => date("d.m.Y",$dateCreated ),
            'email' => $email,
            'emailProvider' => $emailProvider
        );

        array_push($usersArr['userData'], $userItem);
    }

    while ($row = $result['providers']->fetch(PDO::FETCH_ASSOC)) {

        array_push($providersArr, $row);
    }

    $usersArr['totalRows'] = $totalRows;
    $usersArr['providers'] = $providersArr;
    $usersArr['totalPages'] = $totalPagesArr;
    $usersArr['rowsPerPage'] = $rowsPerPage;
    $usersArr['currentPage'] = $currentPage;
    $usersArr['previousPage'] = $previousPage;
    $usersArr['nextPage'] = $nextPage;

    echo json_encode($usersArr);
} else {
    echo json_encode(
        array('message' => 'No users found')
    );
}