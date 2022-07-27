<?php
session_destroy();
setcookie("id", "", -99999);
header("location: ./");
