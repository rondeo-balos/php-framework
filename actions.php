<?php
session_start();

function register_action( $callback ) {
    call_user_func( $callback );
}

$results = array(
    'unauthorized' => array(
        'code' => '401',
        'label' => 'unauthorized',
        'msg' => 'Permission Denied'
    ),
    'authorized' => array(
        'code' => '200',
        'label' => 'authorized',
        'msg' => 'User Authorized'
    ),
    'error' => array(
        'code' => '500',
        'label' => 'error',
        'msg' => 'Something Went Wrong'
    )
);

function set_response( $result = array() ) {
    check_redirect();
    echo json_encode( $result );
    exit();
}

function check_redirect() {
    if( isset( $_REQUEST[ "redirect" ] ) ) {
        header( "Location: $_REQUEST[redirect]" );
    }
}

// Put your actions here. You can also put ajax request, but remember to use exit(); after the current action
// Example

function authenticate() {
    global $result;

    if( isset( $_POST[ "username" ] ) && isset( $_POST[ "password" ] ) ) {
        // Check database if user exists
        // pull the data and register a session
        $exists = true;
        if( $exists ) {
            $_SESSION[ "user_id" ] = "";
            $_SESSION[ "something" ] = "";
            $_SESSION[ "expiration" ] = "";

            set_response( $results[ 'authorized' ] );
        } else {
            // Sending default response
            set_response( $results[ 'unauthorized' ] );
        }
    }
}
register_action( 'authenticate' );