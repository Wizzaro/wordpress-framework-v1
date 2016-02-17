<?php
namespace Wizzaro\WPFramework\v1;

use Wizzaro\WPFramework\v1\Helper\View;

abstract class AbstractController {
    
    protected $_bootstrap;
    
    private $_view_templates_path;
    
    public function __construct( &$bootstrap ) {
        $this->_bootstrap = $bootstrap;
    }
    
    public function init() {
        
    }
    
    public function init_front() {
        
    }
    
    public function init_admin() {
        
    }
    
    public function get_view_templates_path() {
        //create view folder patch
        if ( ! $this->_view_templates_path ) {
            $class_name = explode( '\\', get_called_class() );
            
            if ( is_array( $class_name ) && count( $class_name ) > 0 ) {
                $class_name = preg_replace( '/Controller$/i', '', array_pop ( $class_name ) );
                $class_name = mb_strtolower( preg_replace( '/([a-z])([A-Z])/', '$1-$2', $class_name) );
            } else {
                $class_name = '';
            }

            $this->_view_templates_path = $this->_bootstrap->get_view_templates_path(). 'controller' . DIRECTORY_SEPARATOR . $class_name . DIRECTORY_SEPARATOR;
        }
        
        return $this->_view_templates_path;
    }
    
    public function render_view( $view_file, $view_data = array(), $return_content = false, $view_path = false ) {
        View::get_instance()->render( $this->get_view_templates_path() . $view_file . '.php', $view_data );
    }
    
    public function get_view() {
        return View::get_instance()->get_content( $this->get_view_templates_path() . $view_file . '.php', $view_data );
    }
}