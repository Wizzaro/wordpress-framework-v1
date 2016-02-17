<?php
namespace Wizzaro\WPFramework\v1\Helper;

use Wizzaro\WPFramework\v1\AbstractSingleton; 

class Filter extends AbstractSingleton {
    
    public function filter_text( $text ) {
        $text = sanitize_text_field( esc_attr( $text ) );
        $text = trim( $text );
        
        return $text;
    }
    
    public function filter_hex_color( $color ) {
        if ( '' === $color )
            return '';
    
        // 3 or 6 hex digits, or the empty string.
        if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
            return $color;
    }
}