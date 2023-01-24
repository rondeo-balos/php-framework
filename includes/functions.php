<?php

// You can add your global functions here

function html_attributes( $attributes = array() ) {
    $compiled = join('="%s" ', array_keys( $attributes) ).'="%s"';

    return vsprintf( $compiled, array_map( 'htmlspecialchars', array_values( $attributes ) ) );
}

function register_stylesheets( $link, $option = array() ) {
    echo '<link rel="stylesheet" href="'.home().'/'.$link.'" '.html_attributes( $option ).' />';
}

function register_scripts( $link, $option = array() ) {
    echo '<script type="text/javascript" src="'.home().'/'.$link.'" '.html_attributes( $option ).' />';
}