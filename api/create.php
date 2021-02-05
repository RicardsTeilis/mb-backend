<?php

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../config/Database.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->dateCreated = $data->dateCreated;
$user->email = $data->email;
$user->emailProvider = $data->emailProvider;

if ($user->create()) {
    echo json_encode(
        array('message' => 'User created')
    );
} else {
    echo json_encode(
        array('message' => 'Could not create user')
    );
}