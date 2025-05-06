<?php
session_start();

session_unset();
session_destroy();

header("Location: /desafio-smartdata/public/index.php");
exit;
