<?php
session_start();

function register_action( $callback ) {
    call_user_func( $callback );
}

$result = array(
    'code' => '101',
    'label' => 'code.denied',
    'msg' => 'Permission Denied'
);

function set_response( $result = array() ) {
    echo json_encode( $result );
    exit();
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

            $result[ 'code' ] = '200';
            $result[ 'label' ] = 'code.ok';
            $result[ 'msg' ] = 'Logged in successfully';

            set_response( $result );
        } else {
            // Sending default response
            set_response( $result );
        }
    }
}
register_action( 'authenticate' );