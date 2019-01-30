<?php 
session_start();
unset($_SESSION['keyDir']);
session_destroy();
header("Location:../../");