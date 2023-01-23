<?php
session_start();
require './includes/db.php';
require './includes/config.php';
require './includes/functions.php';

$db = new rbdb( $db_host, $db_username, $db_password, $db_name );

if( function_exists( 'header' ) ) {
    head();
    // Register your stylesheets here
    // example:
    // register_stylesheets( 'assets/css/bootstrap.min.css', array() );
}

if( function_exists( 'content' ) ) {
    content();
}

if( function_exists( 'footer' ) ) {
    // Register your scripts here
    // Example: 
    // register_scripts( 'assets/js/jquery.min.js', array() );
    footer();
}