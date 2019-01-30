<?php 
session_start();
require '../../modelos/rutasAmig.php';
unset($_SESSION['keyDoc']);
unset($_SESSION['clvGrp']);
unset($_SESSION["clvAlm"]);
session_destroy();
header("Location:".SERVERURL);