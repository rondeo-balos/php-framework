<?php

class DatabaseHelper {
    private $mysqli = null;

    private function __construct( $host, $username, $passsword, $database ) {
        $mysqli = new mysqli( $host, $username, $password, $database );
        if( $mysqli -> connect_errno ) {
            echo "Unable to connect to database";
            exit();
        }
    }

    
    private function db() {
        return $mysqli;
    }

    /**
     * Summary
     * 
     * Description
     * 
     * @param string $table Description
     * @param array $values Description
     * @param boolean $debug Description
     * @return object Description
     */
    private function insert( $table, $values = array(), $debug = false ) {
        $keys = implode( ", ", array_keys( $values ) );
        $vals = implode( "', '", array_values( $values ) );
        $sql = "INSERT INTO $table ( $keys ) VALUES ( '$vals' )";
        if( $debug )
            echo $sql;
        return $mysqli -> query( $sql );
    }

    private function update( $table, $values = array(), $conditions = array(), $debug = false ) {
        $compiled_vals = join("='%s', ", array_keys( $values ) )."='%s', ";
        $vals = vsprintf( $compiled_vals, array_values( $values ) );
        
        $compiled_conds = join("='%s', ", array_keys( $conditions ) )."='%s', ";
        $conds = vsprintf( $compiled_conds, array_values( $conditions ) );

        $sql = "UPDATE $table SET $vals WHERE $conds";
        if( $debug )
            echo $sql;
        return $mysqli -> query( $sql );
    }

    private function select( $table, $columns = array(), $join = array(), $conditions = array() ) {
        $joins = implode( ", ", array_values( $join ) );
        $cols = implode( ", ", array_values( $columns ) );

        $compiled_conds = join("='%s', ", array_keys( $conditions ) )."='%s', ";
        $conds = vsprintf( $compiled_conds, array_values( $conditions ) );

        $sql = "SELECT $columns FROM $table ".( sizeof( $join ) > 0 ? "JOIN $joins " : "" )."WHERE $conds";
        if( $debug )
            echo $sql;
        return $mysqli -> query( $sql );
    }

    private function query( $sql ) {
        return $mysqli -> query( $sql );
    }

    private function close() {
        $mysqli -> close();
        exit();
    }
}