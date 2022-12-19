<?php
require_once __DIR__."/vendor/autoload.php";
$time = Time::find($_GET['id']);
$time->delete();
header("location: restritaAdmin.php");