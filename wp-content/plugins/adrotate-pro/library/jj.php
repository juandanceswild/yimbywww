<?php
session_start();
$_SESSION['jj'] = 1;
die('<pre>'.print_r($_SESSION,true));
