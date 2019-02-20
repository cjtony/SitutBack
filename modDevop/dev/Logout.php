<?php 
session_start();
unset($_SESSION['keyDevop']);
session_destroy();
header("Location:../../");