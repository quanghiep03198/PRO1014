<?php
session_destroy();
setcookie("auth", "", -99999);
header("location: ./");
