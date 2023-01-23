<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'my_database';

// Register your tables here
$tables = array(
    // Example
    'options' => 'tbl_options'
);

function home( $directory = '' ) {
    return 'http://'.$_SERVER['HTTP_HOST'].$directory;
}