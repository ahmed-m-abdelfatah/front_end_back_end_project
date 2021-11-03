<?php

$connection =  mysqli_connect('localhost', 'root', 'root', 'front_end_back_end_project');

if (!$connection) {
    echo 'Error: ' . mysqli_connect_error();
}
