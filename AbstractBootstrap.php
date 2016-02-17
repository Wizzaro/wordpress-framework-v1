<?php
namespace Wizzaro\WPFramework\v1;

use Wizzaro\WPFramework\v1\AbstractSingleton; 

abstract class AbstractBootstrap extends AbstractSingleton {
    
    protected $_config = array();
    
    protected function __construct() {
        $config = $this->_get_config();
        
        //set configuration
        if ( array_key_exists( 'configuration', $config) ) {
            $this->_config = $config['configuration'];
        }
        
        //init controllers
        if ( array_key_exists( 'controllers', $config ) ) {
            foreach ( $config['controllers'] as $c_name ) {
                $controller = new $c_name( $this );
                
                $controller->init();
                
                if ( ! is_admin() ) {
                    $controller->init_front();
                } else {
                    $controller->init_admin();
                }
            }
        }
    }
    
    protected function _get_config() {
        return array();
    }
    
    public function get( $group, $key, $default = '' ) {
        if ( isset( $this->_config[$group][$key] ) ) {
            return $this->_config[$group][$key];
        }
        
        return $default;
    }
    
    public function get_dir_patch() {
        return '';
    }
    
    public function get_dir_url() {
        return '';
    }
    
    public function get_css_url() {
        return $this->get_dir_url() . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR;
    }
    
    public function get_css_admin_url() {
        return $this->get_dir_url() . 'assets' . DIRECTORY_SEPARATOR . 'css'. DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR;
    }
    
    public function get_js_url() {
        return $this->get_dir_url() . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR;
    }
    
    public function get_js_admin_url() {
        return $this->get_dir_url() . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR;
    }
    
    public function get_images_url() {
        return $this->get_dir_url() . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
    }
    
    public function get_images_admin_url() {
        return $this->get_dir_url() . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR;
    }
    
    public function get_view_templates_path() {
        return $this->get_dir_patch() . $this->_config['view']['templates_path'] . DIRECTORY_SEPARATOR;
    }
}