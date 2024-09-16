<?php
session_start();
session_destroy();
header("Refresh:0");
header("Location:forminfo.php");
exit();