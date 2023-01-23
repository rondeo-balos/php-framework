<?php

class rbdb {
    private $mysqli = null;

    private function __construct( $host, $username, $passsword, $database ) {
        $mysqli = new mysqli( $host, $username, $password, $database );
        if( $mysqli -> connect_errno ) {
            close();
        }
    }

    private function db() {
        return $mysqli;
    }

    private function insert( $table, $values = array() ) {

    }

    private function update( $table, $values = array(), $conditions = array() ) {

    }

    private function select( $table, $join = array(), $conditions = array() ) {

    }

    private function query( $sql ) {

    }

    private function close() {
        $mysqli -> close();
        exit();
    }
}