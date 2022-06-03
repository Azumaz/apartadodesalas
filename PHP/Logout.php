<?php

session_start();
unset ($SESSION['nombre']);
session_destroy();

header('Location: ../HTML/Home.html');

?>