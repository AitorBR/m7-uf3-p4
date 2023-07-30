<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
unset($_SESSION['window']);
unset($_SESSION["count"]);
unset($_SESSION['presentacion']);
unset($_SESSION['presentacionFilter']);
include_once __DIR__ . '/views/portada_view.php';
