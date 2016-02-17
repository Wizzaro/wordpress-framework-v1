<?php
namespace Wizzaro\WPFramework\v1\Helper;

use Wizzaro\WPFramework\v1\AbstractSingleton; 

class Request extends AbstractSingleton {
    
    public function is_ajax() {
        return defined( 'DOING_AJAX' ) && DOING_AJAX ? true : false;
    }
    
    public function get_request_url() {
        if ( array_key_exists( 'HTTP_HOST', $_SERVER ) && array_key_exists( 'REQUEST_URI', $_SERVER ) ) {
            return 'http' . ( empty( $_SERVER['HTTPS'] ) ? '' : 's' ) . '://' . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
        }
        
        return '';
    }
    
    public function get_user_agent() {
        if ( array_key_exists( 'HTTP_USER_AGENT', $_SERVER ) ) {
            return esc_attr( $_SERVER['HTTP_USER_AGENT'] );
        }
        
        return '';
    }
    
    public function get_remote_addr() {
        if ( array_key_exists( 'REMOTE_ADDR', $_SERVER ) ) {
            return esc_attr( $_SERVER['REMOTE_ADDR'] );
        }
        
        return '';
    }
    
    public function get_http_referer() {
        if ( array_key_exists( 'HTTP_REFERER', $_SERVER ) ) {
            return esc_attr( $_SERVER['HTTP_REFERER'] );
        }
        
        return '';
    }
}