<?php
session_start();

require 'functions.php';

/* Use $_HAS_NAVBAR = false in the pages you don't need the navbar (login, register for example) */
$_HAS_NAVBAR = true;

const BASE_URL = "/TODOLIST/";

if(isset($_SESSION['id']))
$navbar_projects = getProjectsForNavbar();
