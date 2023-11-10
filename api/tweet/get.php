<?php
require_once "../../env.php";

$controller = new ApiController();
$controller->tweets();
error_reporting(E_ALL);
ini_set('display_errors', 1);
